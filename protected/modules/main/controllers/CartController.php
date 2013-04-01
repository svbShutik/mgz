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
            Cookie::remove('order') ;
            $data = Yii::app()->shoppingCart->getPositions() ;
            $this->render('index', array('data'=>$data)) ;
        }
    }

    public function actionCreateorder(){
        if(Yii::app()->user->isGuest) {
            $this->redirect(array('/main/cart/guestorder')) ;
        } else {
            $this->redirect(array('/main/cart/userorder')) ;
        }
    }

    public function actionGuestorder() {
        $model = new GuestOrder() ;

        if(isset($_POST['GuestOrder']))
        {
            $model->attributes=$_POST['GuestOrder'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                return;
            }
        }

        $this->render('guest_order', array('model'=>$model)) ;
    }






 /*   //Выбор доставки
    public function actionDelivery() {
        if(Yii::app()->user->isGuest) {
            $this->redirect(array('/user/login', 'back'=>'cart')) ;
        } else {
            if(isset($_POST['deliveryRadios'])) {
                Cookie::set('delivery', $_POST['deliveryRadios']) ;
                $this->redirect(array('/main/cart/createorder')) ;
            }
            $model = Delivery::model()->findAll() ;
            $this->render('delivery', array('model'=>$model)) ;
        }
    }

    //Создание заказа
    public function actionCreateorder() {
        if(Yii::app()->user->isGuest) {
            $this->redirect(array('/user/login')) ;
        }
        if(Cookie::get('order')) {
            $this->redirect(array('/main/home')) ;
        }
        $user = User::model()->findByPk(Yii::app()->user->getId()) ;
        $this->render('create_order', array('user'=>$user)) ;
    }


    public function actionPayment() {

        Yii::app()->clientScript->registerScript(
            'ShowPayments',
            '
                $(".thumbnail").hover(function(){
                    $(this).find("div.caption").slideToggle() ;
                }) ;
            ',
            CClientScript::POS_READY
        ) ;


        if($_GET['orderId']) {
            Cookie::set('order', Order::model()->getOrder($_GET['orderId'])) ;
        }

        if(!Cookie::get('order')) {
            //создаем заказ
            $order = new Order() ;
            $order->user_id = Yii::app()->user->getId() ;
            $order->create_time = time() ;
            $order->delivery = Cookie::get('delivery') ;
            $order->pay = 0 ;
            $order->total_price = Yii::app()->shoppingCart->getCost() ;
            $order->save() ;
            $order->order_key = $order->id.Yii::app()->user->getId().date('tm') ; // генерим номер заказа
            $order->save() ;
            Cookie::set('order', $order->id) ;

            //заполняем заказ данными
            $data = Yii::app()->shoppingCart->getPositions() ;
            foreach($data as $position) {
                $order_items = new OrderItems() ;
                $order_items->order_id = $order->id ;
                $order_items->product_id = $position->id ;
                $order_items->count = $position->getQuantity() ;
                $order_items->save() ;
            }
            //После записи заказа в БД очищаем корзину :)
            Yii::app()->shoppingCart->clear() ;
        } else {
            $order = Order::model()->loadModel(Cookie::get('order')) ;
            if(Cookie::get('delivery')) {
                $order->delivery = Cookie::get('delivery') ;
                $order->save(false) ;
            }
        }

        $this->render('payment', array('order'=>$order)) ;
    }*/


}