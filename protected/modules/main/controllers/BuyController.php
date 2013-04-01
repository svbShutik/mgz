<?php

class BuyController extends Controller
{
    public $layout = '//layouts/column2' ;

    public function actionIndex()
    {
        if(Yii::app()->request->isAjaxRequest) {
            $model = Product::model()->loadmodel($_GET['numiid']) ;
            $count = $_GET['count'] ;
            if($model->active == 1) {
                if(!$count) {
                    $count = 1 ;
                }
                Yii::app()->shoppingCart->put($model, $count) ;
                echo "<strong>".Yii::app()->shoppingCart->getItemsCount()."</strong><span> шт.</span>" ;
            }
        }
    }



}