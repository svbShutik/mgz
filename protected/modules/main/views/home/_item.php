<table class="table">
    <thead>
        <tr style="color: #5B5B5B;">
            <th>Номер заказа</th>
            <th>Дата заказа</th>
            <th>Способ доставки</th>
            <th>Сумма к оплате</th>
            <th>Статус</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($items->getData() as $i=>$item){
            echo "<tr>";
                $delivery = Delivery::model()->getDelivery($item['delivery']) ;
                echo "<td>".$item['order_key']."</td><td>".date('d.m.Y',$item['create_time'])."</td><td>".$delivery->title."</td><td>".$item['total_price']." руб.</td><td>".Helper::getPaymentList($item['pay'])."</td>" ;
                if($item['pay']==0)
                    echo "<td>".CHtml::link('Оплатить', array('/main/cart/payment', 'orderId'=>$item['order_key']), array('class'=>'btn btn-warning btn-small'))."</td>";

            echo "</tr>";
        }
        ?>
    </tbody>
</table>