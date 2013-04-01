<?php

class AttributegroupController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
            /*array(
                'ESetReturnUrlFilter',

            ),*/
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $sql = "SELECT * FROM attribute WHERE attribute_group_id=".$id ;
        $value = new CSqlDataProvider($sql);

		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'value'=>$value,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AttributeGroup;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AttributeGroup']))
		{
			$model->attributes=$_POST['AttributeGroup'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AttributeGroup']))
		{
			$model->attributes=$_POST['AttributeGroup'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

        //получаем массив ИД атрибутов находящихся в удоляемой группе
        $sql = "SELECT id FROM attribute WHERE attribute_group_id=".$id ;
        $attr_array = Yii::app()->db->createCommand($sql)->queryAll() ;

        if(count($attr_array) > 0) {
            //удаляем из БД все значения полученных атрибутов
            $attribute_id = array() ;
            foreach($attr_array as $item) {
                $attribute_id[] = $item['id'] ;
            }
            $sql = "DELETE FROM attribute_value WHERE attribute_id IN (".implode(',',$attribute_id).")" ;
            Yii::app()->db->createCommand($sql)->execute() ;
        }

        //удаляем все атрибуты, принадлежащие группе
        $sql = "DELETE FROM attribute WHERE attribute_group_id=".$id ;
        Yii::app()->db->createCommand($sql)->execute() ;

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AttributeGroup');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AttributeGroup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AttributeGroup']))
			$model->attributes=$_GET['AttributeGroup'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AttributeGroup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AttributeGroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AttributeGroup $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attribute-group-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
