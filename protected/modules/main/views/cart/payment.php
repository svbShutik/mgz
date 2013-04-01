<legend>Информация о Вашем заказе:</legend>
<?php
    echo "Номер заказа: ".$order->order_key."<br>" ;
    echo "Сумма к оплате: ".$order->total_price." руб.<br>" ;
    $delivery = Delivery::model()->getDelivery($order->delivery) ;
    echo "Способ доставки: ".$delivery->title."<br>" ;
    echo "Статус: ".Helper::getPaymentList($order->pay)."<br>" ;
?>

<div class="top-padding"></div>

<div class="well well-small">
    <h5>Выбирите способ оплаты:</h5>
    <div class="row-fluid">
        <ul class="thumbnails">
            <li class="span3">
                <div class="thumbnail">
                    <?php echo CHtml::image('/img/noimage.png', '300x200', array('style'=>'width:200px; height:200px;'));?>
                    <div class="caption">
                        <h4>Robocassa.ru</h4>
                        <p><?php echo CHtml::link('Оплатить', array('/main/payment', 'id'=>$order->order_key), array('class'=>'btn btn-success')) ; ?></p>
                    </div>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <?php echo CHtml::image('/img/noimage.png', '300x200', array('style'=>'width:200px; height:200px;'));?>
                    <div class="caption">
                        <h4>Qiwi.com</h4>
                        <p><?php echo CHtml::link('Оплатить', array('/main/payment', 'id'=>$order->order_key), array('class'=>'btn btn-success')) ; ?></p>
                    </div>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <?php echo CHtml::image('/img/noimage.png', '300x200', array('style'=>'width:200px; height:200px;'));?>
                    <div class="caption">
                        <h4>Яндекс.деньги</h4>
                        <p><?php echo CHtml::link('Оплатить', array('/main/payment', 'id'=>$order->order_key), array('class'=>'btn btn-success')) ; ?></p>
                    </div>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <?php echo CHtml::image('/img/noimage.png', '300x200', array('style'=>'width:200px; height:200px;'));?>
                    <div class="caption">
                        <h4>Банковский перевод</h4>
                        <p><?php echo CHtml::link('Оплатить', array('/main/payment', 'id'=>$order->order_key), array('class'=>'btn btn-success')) ; ?></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
