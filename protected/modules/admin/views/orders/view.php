<legend>Просмотр заказа №<?php echo $model->order_key ;?></legend>
<div class="well well-small">
    <h6>Информация о заказчике:</h6>
<?php
    if(isset($user)) {
        $this->renderPartial('_user', array('user'=>$user)) ;
    } elseif(isset($guest)) {
        $this->renderPartial('_guest', array('guest'=>$guest)) ;
    }
?>
</div>

<legend>Список товаров в заказе</legend>
<table class="table">
    <thead>
        <tr>
            <th>ID товара</th>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Кол-во</th>
            <th>Остаток на складе</th>
        </tr>
    </thead>
<?php
$items = $model->items ;
foreach($items as $item){
    echo "<tr>" ;
        echo "<td>".$item->product->id."</td>" ;
        echo "<td>".CHtml::link($item->product->title, array('/main/view/index', 'numiid'=>$item->product->id))."</td>" ;
        echo "<td>".$item->product->price."</td>" ;
        echo "<td>".$item->count."</td>" ;
        echo "<td>".$item->product->quantity."</td>" ;
    echo "</tr>" ;
}
?>
</table>