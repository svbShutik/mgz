<?php

class SiteController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */

	public function actionIndex($id=0)
	{
     //   $id = $_GET['id'] ;
        //if (Yii::app()->user->isGuest) {
        if(Yii::app()->request->isAjaxRequest) {
            echo "<div class='well'>".$id."</div>" ;
            Yii::app()->end() ;
        }
        $this->render('index');

	}

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}