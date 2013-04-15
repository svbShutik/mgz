<?php


class CartController extends Controller
{
    //public $layout = '//layouts/column1' ;



    public function actionClear() {
            Yii::app()->shoppingCart->clear() ;
            $this->redirect($this->createUrl("/main/cart")) ;
    }

    public function actionDelete() {

        $product = Product::model()->loadmodel($_GET['numiid']) ;
        Yii::app()->shoppingCart->remove($product->getId()) ;
        $this->redirect($this->createUrl("/main/cart")) ;

    }

    //Всплывашка со списком товаров в корзине
    public function actionCartTips() {
        if(Yii::app()->request->isAjaxRequest) {
            $data = Yii::app()->shoppingCart->getPositions() ;
            $json = $this->createCartTips($data) ;
            echo CJSON::encode($json) ;
        }
    }

    //html разметка для всплывашки корзины
    protected function createCartTips($data) {
        $html ="" ;
        if(count($data)){
            $html = "<div id='cartTips' class='cartTips'>\n <div class='popoverbottom'>\n <div class='popover-content'>
            <table class='table table-condensed'>
            " ;

            foreach($data as $position) {
                $html .= "<tr class='cartTipsItem'>
                            <td>".CHtml::link(CHtml::image(ProductImg::model()->getFirstImage($position->id),$position->title,array('style'=>'width:70px;')), array('/main/view', 'numiid'=>$position->id))."</td><td>".$position->getQuantity()." шт.</td><td><strong>".$position->getSumPrice()." </strong>руб.</td>
                          </tr>" ;
            }
            $html .= "</table>\n </div>\n </div>\n </div>" ;
        }


        $json = array('type'=>'success', 'html'=>$html) ;
        return $json ;
    }

    public function actionIndex()
    {
        $this->pageTitle = Yii::app()->name.": Корзина товаров" ;
        if(Yii::app()->shoppingCart->getCount()=="0") {
            Yii::app()->user->setFlash('emptyCart', "Корзина пустая!") ;
            $this->render('index') ;
        } else {
            $data = Yii::app()->shoppingCart->getPositions() ;

            Yii::app()->clientScript->registerScript(
                'ProductInCart',
                '
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
                                    buyItems: "cart",
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

            Cookie::remove('order') ;
            $this->render('index', array('data'=>$data)) ;
        }
    }

    public function actionCreateorder(){
        if(Yii::app()->user->isGuest) {
            $this->redirect(array('/main/cart/choise')) ;
        } else {
            $this->redirect(array('/main/cart/userorder')) ;
        }
    }

    public function actionChoise() {
        $this->pageTitle = Yii::app()->name.": Выбор" ;
        if(!Yii::app()->user->isGuest) {
            $this->redirect(array('/main/cart/createorder')) ;
        }
        $this->render('choise') ;
    }

    public function actionGuestorder() {
        $this->pageTitle = Yii::app()->name.": Оформление заказа" ;

        $model=new Guest();

        // uncomment the following code to enable ajax-based validation

        if(isset($_POST['ajax']) && $_POST['ajax']==='guest-form-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Guest']))
        {
            $model->attributes=$_POST['Guest'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->render('guest_order', array('model'=>$model)) ;
    }


}