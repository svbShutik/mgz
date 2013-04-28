<?php

class CalluserController extends Controller
{
	public function actionIndex()
	{
        $this->pageTitle = Yii::app()->name.": Список запросов на обратный звонок" ;
        $dataProvider = new CActiveDataProvider('CallUser', array(
            'criteria'=>array(
                'order'=>'create_time DESC',
            ),
            'pagination'=>array(
                'pageSize'=>25,
            ),
        )) ;
		$this->render('index', array('dataProvider'=>$dataProvider));
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