<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
        $user_id = $this->loadUser() ;

        $sort = new CSort();
        // имя $_GET параметра для сортировки,
        // по умолчанию ModelName_sort
        $sort->sortVar = 'sort';
        // сортировка по умолчанию
        $sort->defaultOrder = 'create_time DESC';
        // включает поддержку мультисортировки,
        // т.е. можно отсортировать сразу и по названию и по цене
        $sort->multiSort = true;
        // здесь описываем аттрибуты, по которым будет сортировка
        // ключ может быть произвольный, это будет $_GET параметр
        $sort->attributes = array(
            'number'=>array(
                'label'=>'Номеру заказа',
                'asc'=>'order_key ASC',
                'desc'=>'order_key DESC',
                'default'=>'desc',
            ),
            'price'=>array(
                'asc'=>'pay ASC',
                'desc'=>'pay DESC',
                'default'=>'desc',
                'label'=>'Цене',
            ),
            'create_time'=>array(
                'asc'=>'create_time ASC',
                'desc'=>'create_time DESC',
                'default'=>'desc',
                'label'=>'Дате',
            ),
        );


        //Список заказов пользователя
        $orders = new CActiveDataProvider('Order', array(
            'criteria'=>array(
                'condition'=>'user_id='.$user_id,
                //'order'=>'create_time DESC',
            ),
            'pagination'=>array(
                'pageSize'=>'25',
            ),
            'sort'=>$sort,
        )) ;

		$this->render('index', array('orders'=>$orders));
	}

    //Возвращает ID пользователя
    public function loadUser() {
        if(Yii::app()->user->isGuest) {
            $this->redirect(array('/user/login')) ;
        }
        return Yii::app()->user->getId() ;
    }
}