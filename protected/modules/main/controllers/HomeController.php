<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
        $user_id = $this->loadUser() ;

        $sql = "SELECT * FROM orders WHERE user_id=".$user_id ;
        $count = Yii::app()->db->createCommand("SELECT COUNT(*) FROM orders WHERE user_id=".$user_id)->queryScalar() ;

        $pages = new CPagination($count) ;
        $pages->pageSize = '15' ;

        $order = new CSqlDataProvider($sql, array(
            'totalItemCount'=>$count,
            'pagination'=>array(
                'pageSize'=>15,
            ),
        )) ;

		$this->render('index', array('dataProvider'=>$order, 'pages'=>$pages));
	}

    //Возвращает ID пользователя
    public function loadUser() {
        if(Yii::app()->user->isGuest) {
            $this->redirect(array('/user/login')) ;
        }
        return Yii::app()->user->getId() ;
    }
}