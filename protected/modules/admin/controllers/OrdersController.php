<?php

class OrdersController extends Controller
{
	public function actionIndex()
	{
        $orders = new CActiveDataProvider('Order',array(
            'pagination'=>array(
                'pageSize'=>'75',
            ),
        )) ;

		$this->render('index', array('orders'=>$orders));
	}

    public function actionView($id) {
        $model = Order::model()->getOrder_key($id) ;
        $param = array('model'=>$model) ;

        if($model->user_id != 0) {
            $user = User::model()->findByPk($model->user_id) ;
            $param['user'] = $user ;
        } else {
            $guest = Guest::model()->findByPk($model->guest_id) ;
            $param['guest'] = $guest ;
        }

       /* //Список товаров в заказке
        $order_items = new CActiveDataProvider('OrderItems', array(
            'criteria'=>array(
                'condition'=>'order_id='.$model->id,
            ),
            'pagination'=>array(
                'pageSize'=>'25',
            ),
        )) ;

        $param['order_items'] = $order_items ;
       */

        $this->render('view', $param) ;
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