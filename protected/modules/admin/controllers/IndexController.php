<?php

class IndexController extends Controller
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
		$this->render('index');
	}
}