<?php

class DefaultController extends Controller
{
    public $layout = '//layouts/column2' ;
    //public $catalog_menu = array() ;

    public function actionIndex()
    {
        $this->pageTitle = "SvbShop: штучки и ништячки :)" ;
        $this->pageDescription = "Интернет-магазин всяких нужных и ненужных штучек и ништячков!" ;
        $params = array() ;

        if(isset($_GET['cid'])) {
            // находимся в какой то категории
            $root = Category::model()->loadModel($_GET['cid']) ;
            $bread_array = Category::model()->getBreadcrumbs($root) ;
            $catalog_menu = $root->children()->findAll() ; // список подкатегорий в текущей категории

            $descendants = $root->descendants()->findAll() ; // Выбираем ВСЕХ потомков категории
            $node_id[] = $_GET['cid'] ;
            foreach($descendants as $node) {
                $node_id[] = $node->id ;
            }
            // список продуктов в текущей категории, и подкатегориях
            $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM product WHERE category_id IN ('.implode(",", $node_id).')')->queryScalar() ; // определяем сколько всего товаров в категории и подкатегориях

            $sql = "SELECT * FROM product WHERE category_id IN (".implode(',',$node_id).") AND active =1" ;

        } else {
            // список всех активных продуктов
            $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM product WHERE active=1')->queryScalar() ; // определяем сколько всего товаров в категории и подкатегориях

            $sql = "SELECT * FROM product WHERE active=1" ;

            $catalog_menu = Category::model()->roots()->findAll() ;
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

        $this->render('index', array('catalog_menu'=>$catalog_menu, 'items'=>$dataProvider, 'pages'=>$pages, 'bread_array'=>$bread_array));
    }
}