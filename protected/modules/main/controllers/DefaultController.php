<?php

class DefaultController extends Controller
{
//$this->layout='/layouts/main';
    public $layout = '//layouts/column2' ;
    public $catalog_menu = array() ;

    public function actionIndex()
    {
        $this->pageTitle = "SvbShop: штучки и ништячки :)" ;
        $this->pageDescription = "Интернет-магазин всяких нужных и ненужных штучек и ништячков!" ;
        $params = array() ;

        if(isset($_GET['cid'])) {
            // находимся в какой то категории
            $root = Category::model()->loadModel($_GET['cid']) ;
            $model = $root->children()->findAll() ; // список подкатегорий в текущей категории

            $descendants = $root->descendants()->findAll() ; // Выбираем ВСЕХ потомков категории
            $node_id[] = $_GET['cid'] ;
            foreach($descendants as $node) {
                $node_id[] = $node->id ;
            }
            // список продуктов в текущей категории, и подкатегориях c первыми (sort=1) картинками
            $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM product WHERE category_id IN ('.implode(",", $node_id).')')->queryScalar() ; // определяем сколько всего товаров в категории и подкатегориях

            $sql = "SELECT DISTINCT p.*, i.img_file
                    FROM (SELECT DISTINCT p.* FROM product p WHERE p.category_id IN (".implode(',',$node_id).")) p
                    LEFT JOIN (SELECT DISTINCT i.product_id, i.img_file FROM product_img i WHERE i.sort=1) i ON p.id = i.product_id
                    WHERE p.active=1" ;

        } else {
            // список всех активных продуктов c первыми (sort=1) картинками
            $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM product WHERE active=1')->queryScalar() ; // определяем сколько всего товаров в категории и подкатегориях

            $sql = "SELECT DISTINCT p.*, i.img_file
                    FROM product p
                    LEFT JOIN (SELECT DISTINCT i.product_id, i.img_file FROM product_img i WHERE i.sort=1) i ON p.id = i.product_id
                    WHERE p.active=1" ;

            $model = Category::model()->roots()->findAll() ;
        }

        $dataProvider = new CSqlDataProvider($sql, array(
            'totalItemCount'=>$count,
            'pagination'=>array(
                'pageSize'=>30,
            ),
        )) ;

        $pages = new CPagination($count);
        $pages->pageSize = 30;


        Yii::app()->clientScript->registerScript(
            'ProductInCart',
            '
                    $("#cart-block").popover({
                        content: "Товар добавлен в корзину!",
                        trigger: "none",
                        placement: "left",
                        template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><h3 class=\"popover-title\" style=\"display: none\"></h3><div class=\"popover-content\"><p></p></div></div></div>"
                    }) ;
                    $("a[rel=popover]").click(function(e){
                        $("#cart-block").popover("show") ;
                    });

                    $("html").click(function() {
                        $("#cart-block").popover("hide");
                    });

        ',
            CClientScript::POS_READY
        ) ;


        $this->render('index', array('data'=>$model, 'items'=>$dataProvider, 'pages'=>$pages));
    }



}