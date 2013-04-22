<tr>
<?php
    echo "<td>".$data->order_key."</td>";
    echo "<td>".date('d.m.Y',$data->create_time)."</td>";
    echo "<td>".$data->pay." руб.</td>";
    echo "<td>".Helper::getPaymentList($data->status)."</td>";
    if($data->done == '0' && $data->status == '0') {
        echo "<td>".CHtml::link('Оплатить',array('/main/payment/index', 'order'=>$data->order_key), array('class'=>'btn btn-warning'))."</td>";
    }

/*$this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$orders,
            'columns'=>array(
                'order_key',
                array(
                    'name'=>'create_time',
                    'value'=>'date("d.m.Y", $data->create_time)',
                ),
                array(
                    'name'=>'Сумма заказа',
                    'value'=>'$data->pay." руб."',
                ),

                array(            // display a column with "view", "update" and "delete" buttons
                    'class'=>'CButtonColumn',
                ),
            ),
));*/
?>
</tr>