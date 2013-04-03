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
   /*     $model = new GuestOrder() ;

        if(isset($_POST['GuestOrder']))
        {
            $model->attributes=$_POST['GuestOrder'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                return;
            }
        }

        $this->render('guest_order', array('model'=>$model)) ;*/
    }


}