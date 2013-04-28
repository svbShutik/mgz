<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shutik
 * Date: 20.04.13
 * Time: 15:16
 * To change this template use File | Settings | File Templates.
 */
?>
<legend><?php echo CHtml::link('Список заказов', array('/admin/orders/index'));?></legend>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$orders,
    'columns'=>array(
        'id',
        array(
            'name'=>'order_key',
            'type'=>'html',
            'value'=>'CHtml::link($data->order_key, array("/admin/orders/view", "id"=>$data->order_key))',
        ),
        array(
            'name'=>'create_time',
            'value'=>'date("d.m.Y", $data->create_time)',
        ),
        array(
            'name'=>'delivery',
            'value'=>function($data){
                $delivery = Delivery::model()->getDelivery($data->delivery);
                return $delivery->title;
            },
        ),
        array(
            'name'=>'pay',
            'value'=>'$data->pay." руб."',
        ),
        array(
            'name'=>'status',
            'type'=>'html',
            'value'=>function($data){
                return Helper::getPaymentList($data->status);
            },
        ),
        array(
            'name'=>'done',
            'value'=>function($data){
                $status = array(0=>'На выполнении', 1=>'ОТПРАВЛЕН ЗАКАЗЧИКУ');
                return $status[$data->done] ;
            },
        ),
    ),
));
?>