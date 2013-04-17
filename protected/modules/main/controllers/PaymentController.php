<?php

class PaymentController extends Controller
{
    public $layout = '//layouts/column1' ;

    public function actionIndex()
    {
        $form = new PaymentForm() ;

        if(isset($_POST['PaymentForm']) || isset($_GET['order'])) {
            if(isset($_POST['PaymentForm'])){
                $form->attributes = $_POST['PaymentForm'] ;
            } else {
                $form->order = $_GET['order'] ;
            }

            if($form->validate()) {
                $model = Order::model()->find('order_key=:ORDER',array(':ORDER'=>$form->order)) ;
                if(!count($model)) {
                    Yii::app()->user->setFlash('order_error', '<strong>Внимание.</strong> Заказ №'.$form->order.' не существует!') ;
                    $this->redirect(array('/main/payment/index')) ;
                }
                $this->render('index', array('order'=>$model, 'form'=>$form)) ;
                Yii::app()->end() ;
            }
        }

        $this->render('index', array('form'=>$form)) ;
    }
}