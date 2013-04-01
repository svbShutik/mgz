<legend style="color: #679a06">Список заказов</legend>
<div class="well">
<?php
/*echo $user->email."<br>" ;
echo $user->username."<br>" ;
echo $user->profile->firstname."<br>" ;
echo $user->profile->lastname."<br>" ;
echo $user->addr->adds."<br>" ;*/


        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$order,
            'columns'=>array(
                'order_key'=>array(
                    'name'=>'order_key',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->order_key, array("/admin/orders/view", "id"=>$data->id))',
                ),
                'user_id' => array(
                    'name'=>'user_id',
                    'header'=>'E-mail',
                    'value'=>'$data->user->email',
                ),
                'create_time' => array(
                    'name'=>'create_time',
                    'header'=>'Дата заказа',
                    'value'=>'date("d.m.Y", $data->create_time)',
                ),
                'total_price' => array(
                    'name'=>'total_price',
                    'header'=>'Сумма заказа',
                ),
                'pay'=> array(
                    'name'=>'pay',
                    'type'=>'html',
                    'value'=>'Helper::getPaymentList($data->pay)',
                    'filter'=>Helper::$payment_list,
                ),




               /* array(            // display a column with "view", "update" and "delete" buttons
                    'class'=>'CButtonColumn',
                    'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/product/delete", array("id"=>$data["id"]))',
                    'viewButtonUrl'=>'Yii::app()->createUrl("/admin/product/view", array("id"=>$data["id"]))',
                    'updateButtonUrl'=>'Yii::app()->createUrl("/admin/product/update", array("id"=>$data["id"]))',
                    //'template'=>'{view}{edit}{delete}',
                ),*/
            ),
        ));
?>
</div>
