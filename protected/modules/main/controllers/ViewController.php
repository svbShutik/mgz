<?php

class ViewController extends Controller
{
   //public $layout = '//layouts/column2' ;

    public function actionIndex()
    {
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

                    $(document).ready(function() {
                    $("#productCount").keypress(function(e) {
                        if (!(e.which>47 && e.which<58)) return false;
                    });
                    });
        ',
            CClientScript::POS_READY
        ) ;

        //Данные о товаре
        $model = Product::model()->loadmodel($_GET['numiid']) ;

        $this->pageTitle =Yii::app()->name.": ".$model->title." - ".$model->price." руб." ;
        $this->pageDescription = $model->desc ;

        //Список картинок товара
        $imgList = ProductImg::model()->getImageList($model->id) ;
        if($model->active != 1) {
            throw new CHttpException(404) ;
        }

        //Аттрибуты товара
        $attr = AttributeValue::model()->getAttributeValueList($model->id) ;

        $this->render('index', array('model'=>$model, 'imgList'=>$imgList, 'attr'=>$attr)) ;
    }

}