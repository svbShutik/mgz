<?php

class AdminModule extends CWebModule
{
    //public $layout='//layouts/main';

	public function init()
	{
        $this->layout='/layouts/main';
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
            //Запрещаем доступ всем кроме админа
            if(!Yii::app()->user->isAdmin())
            {
                Yii::app()->request->redirect(Yii::app()->homeUrl);
            }
			return true;
		}
		else
			return false;
	}
}
