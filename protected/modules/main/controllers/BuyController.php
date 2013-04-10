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

    /*
     * покупка в один клик
     * TODO: разделить логику, покупка в один клик из корзины, куда добавленно несколько товаров, и покупка на странице товара, где не учитываются добавленные в корзину товары!
    */
    public function actionBuy1click() {
        //принимаем только аякс запросы
        if(Yii::app()->request->isAjaxRequest) {
            $model = new CallUser() ;
            $model->phone = $_POST['phoneNumber'] ;
            if(isset($_POST['callTime'])) {
                $model->call_time = $_POST['callTime'] ;
            }
            if(is_numeric($_POST['buyItems'])){
                //$model->items = $_POST['buyItems'] ;
                $model->items = serialize(array('id'=>$_POST['buyItems'],'count'=>'1')) ;
            } else {
                $data = Yii::app()->shoppingCart->getPositions() ;
                $product_list = array() ;
                foreach($data as $position) {
                    $product_list[]=array(
                        'id'=>$position->id,
                        'count'=>$position->getQuantity(),
                    ) ;
                }
                $model->items = serialize($product_list) ;
            }
            $model->create_time = time() ;

            if($model->save()) {
                // чего возвращать
            }
            Yii::app()->end() ;
        }
    }



}