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

        $model = new Guest() ;
        $order = new Order() ;
        $order->order_key = '0' ;
        $order->create_time = time() ;
        $order->done = '0' ;
        $order->pay = '0' ;
        $order->status = '0' ;

        // uncomment the following code to enable ajax-based validation

        if(isset($_POST['ajax']) && $_POST['ajax']==='guest-form-form')
        {
            echo CActiveForm::validateTabular(array($model,$order));
            Yii::app()->end();
        }

        if(isset($_POST['Guest'], $_POST['Order']))
        {
            $model->attributes=$_POST['Guest'] ;
            $order->attributes=$_POST['Order'] ;

            //валидация
            $valid = $model->validate() ;
            $valid = $order->validate() && $valid ;

            if($valid)
            {
                //Все чики-пуки, записываем заказ в БД
                $model->save(false) ; //инфо заказчика

                $order->order_key = $model->id.date('ms',time()).rand(1,99);

                $delivery = Delivery::model()->getDelivery($order->delivery) ;
                $order->pay = Yii::app()->shoppingCart->getCost() + $delivery->price ;

                $order->guest_id = $model->id ;

                $order->save(false) ;


                //заносим в БД список заказанных товаров
                foreach(Yii::app()->shoppingCart->getPositions() as $position) {
                    $order_item = new OrderItems() ;
                    $order_item->order_id = $order->id ;
                    $order_item->product_id = $position->id ;
                    $order_item->count = $position->getQuantity() ;
                    $order_item->price = $position->getPrice() ;
                    $order_item->save() ;
                }

                //Очищаем корзину после создания заказа
                Yii::app()->shoppingCart->clear() ;

                // form inputs are valid, do something here
                $this->redirect(array('/main/payment/index', 'order'=>$order->order_key)) ;
            }
        }
        $this->render('guest_order', array('model'=>$model, 'order'=>$order)) ;
    }

}