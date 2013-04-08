<?php

class ViewController extends Controller
{
    public function actionIndex()
    {
        $model = Product::model()->loadmodel($_GET['numiid']) ;

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

                    $("#buy1click").click(function(){
                        if(!$("#phoneNumber").val().length) {
                            if(!$("#delete_msg").length)
                                $("#phoneNumber").after("<p class=\"text-error\" id=\"delete_msg\"><small>Введите номер телефона</small></p>") ;
                        } else {
                            if($("#delete_msg").length) {
                                $("#delete_msg").remove() ;
                            }

                            $.ajax({
                                url: "'.$this->createUrl("/main/buy/buy1click").'",
                                type: "POST",
                                data: {
                                    phoneNumber: $("#phoneNumber").val(),
                                    callTime: $("#callTime").val(),
                                    buyItems: '.$model->id.',
                                },
                                beforeSend: function(){
                                    $("#phoneNumber").after("<p class=\"text-success\" id=\"success_msg\">Секундушку, записываем Вас в очередь :)</p>") ;
                                },
                                success: function(){
                                    $("#success_msg").remove() ;
                                    $("#callBack").modal("hide") ;
                                    alertify.success("<i class=\"icon2-smiley\"></i> В ближайшее время с Вами свяжется наш менеджер для уточнения заказа!", 0);
                                }
                            }) ;
                        }
                    }) ;
        ',
            CClientScript::POS_READY
        ) ;

        $this->pageTitle =Yii::app()->name.": ".$model->title." - ".$model->price." руб." ;
        $this->pageDescription = $model->desc ;

        //Список картинок товара
        $imgList = ProductImg::model()->getImageList($model->id) ;
        if($model->active != 1) {
            throw new CHttpException(404) ;
        }

        //Аттрибуты товара
        $attr = AttributeValue::model()->getAttributeValueList($model->id) ;


        $bread_array = Category::model()->getBreadcrumbs(Category::model()->loadModel($model->category_id)) ;



        $this->render('index', array('model'=>$model, 'imgList'=>$imgList, 'attr'=>$attr, 'bread_array'=>$bread_array)) ;
    }

}