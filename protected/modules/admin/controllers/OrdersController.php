<?php

class OrdersController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            /*array(
                'ESetReturnUrlFilter',

            ),*/
        );
    }

	public function actionIndex()
	{
         $dataProvider = new CActiveDataProvider('Order', array(
            'pagination'=>array(
                'pageSize'=>25,
            ),
        )) ;

         //$user = Yii::app()->getModule('user')->user(Yii::app()->user->getId()) ;
		$this->render('index', array('order'=>$dataProvider));
	}

    public function actionView($id) {
        $order = Order::model()->loadModel($id) ;
        $this->render('view', array('order'=>$order)) ;
    }
}