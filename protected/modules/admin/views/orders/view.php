<legend>Заказ № <?php echo $order->order_key." от ".date('d.m.Y', $order->create_time);?><div class="pull-right"><?php echo CHtml::link('Список заказов', array('/admin/orders'), array('class'=>'btn btn-success'))?></div></legend>
<div class="row-fluid">
    <div class="span6">
        <div class="well well-small">
            <address>
                <?php echo CHtml::encode($order->user->profile->firstname." ".$order->user->profile->lastname)." (".$order->user->username.")";?><br />
                <strong>Адрес доставки:</strong><br />
                <?php echo CHtml::encode($order->user->addr->indx);?><br />
                <?php echo CHtml::encode($order->user->addr->region.", ".$order->user->addr->city);?><br />
                <?php echo CHtml::encode($order->user->addr->adds);?><br />
                <abbr title="Номер телефона">P:</abbr><?php echo CHtml::encode($order->user->addr->phone);?><br />
                <br />
                <?php echo "E-mail: ".CHtml::mailto($order->user->email,$order->user->email);?><br />
                <?php echo CHtml::encode("ICQ: ".$order->user->addr->icq);?><br />
                <?php echo CHtml::encode("Skype: ".$order->user->addr->skype);?><br />
            </address>
        </div>
    </div>
    <div class="span6">
        <div class="well well-small">
            <h5>Информация о заказе:</h5>
            Сумма к оплате: <?php echo CHtml::encode($order->total_price);?> руб.<br />
            Способ доставки: <?php $delivery = Delivery::model()->getDelivery($order->delivery) ; echo $delivery->title;?><br />
            Статус: <?php echo Helper::getPaymentList($order->pay);?><br />
        </div>
    </div>

    <div class="span12">
        <table class="table">
            <thead>
            <tr>
                <th>
                    ID товара
                </th>
                <th>

                </th>
                <th>
                    Название
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Кол-во
                </th>
                <th>
                    Остаток на складе
                </th>

            </tr>
            </thead>
            <tbody>
                <?php
                foreach($order->items as $item){
                    echo "<tr>" ;
                    echo "<td><strong>".$item->products->id."</strong></td>";
                    echo "<td>".CHtml::image(ProductImg::model()->getFirstImage($item->product_id),'', array('style'=>'width: 85px;'))."</td>";
                    echo "<td>".CHtml::link($item->products->title, array('/main/view', 'numiid'=>$item->product_id))."</td>";
                    echo "<td>".$item->products->price." руб.</td>";
                    echo "<td>".$item->count." шт.</td>";
                    echo "<td>".$item->products->quantity." шт.</td>";
                    echo "</tr>" ;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<!--echo "<div class='img'>" ;
    if(empty($item['img_file'])) {
    echo CHtml::image("/img/noimage.png") ;
    } else {
    echo CHtml::image(ProductImg::PRODUCT_IMG_DIR.$item['id']."/".$item['img_file'], '') ;
    }
    echo "</div>" -->