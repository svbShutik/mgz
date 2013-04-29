<legend>Просмотр заказа №<?php echo $order->order_key?></legend>
<table class="table">
<?php
foreach($order->items as $item) {
    echo "<tr>";
    echo "<td><div class='thumbnail'>".CHtml::image(ProductImg::model()->getFirstImage($item->product_id), $item->product->title,array())."</div></td>" ;
    echo "<td>".$item->product->title."</td>" ;
    echo "<td>".$item->product->price." руб.</td>" ;
    echo "<td>".$item->count." шт.</td>" ;
    echo "</tr>";
}
?>
</table>
