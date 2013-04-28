<?php

class OrdersController extends Controller
{
	public function actionIndex()
	{
        $this->pageTitle = Yii::app()->name.": Заказы" ;
        $orders = new CActiveDataProvider('Order',array(
            'pagination'=>array(
                'pageSize'=>'75',
            ),
        )) ;

		$this->render('index', array('orders'=>$orders));
	}

    public function actionView($id) {
        $this->pageTitle = Yii::app()->name.": Просмотр заказа" ;
        $model = Order::model()->getOrder_key($id) ;
        $param = array('model'=>$model) ;

        if($model->user_id != 0) {
            $user = User::model()->findByPk($model->user_id) ;
            $param['user'] = $user ;
        } else {
            $guest = Guest::model()->findByPk($model->guest_id) ;
            $param['guest'] = $guest ;
        }

        $this->render('view', $param) ;
    }

    public function actionAjaxstatus() {
        if(Yii::app()->request->isAjaxRequest) {
            if(isset($_POST['order_id']) && isset($_POST['status'])){
                $order = Order::model()->findByAttributes(array('id'=>$_POST['order_id'])) ;
                $order->status = (int)$_POST['status'] ;
                $order->save() ;
            }
        }
    }


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}