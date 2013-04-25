<legend>Просмотр заказа №<?php echo $model->order_key ;?></legend>
<div class="row-fluid">
<div class="span6">
    <div class="well well-small">
        <h3>Информация о заказчике:</h3>
    <?php
        if(isset($user)) {
            $this->renderPartial('_user', array('user'=>$user)) ;
        } elseif(isset($guest)) {
            $this->renderPartial('_guest', array('guest'=>$guest)) ;
        }
    ?>
    </div>
</div>

<div class="span6">
    <div class="form-inline">
        <div class="input-prepend input-append">
        <?php
            echo "<span class='add-on'>".CHtml::activeLabel($model, 'status')."</span>" ;
            echo CHtml::activeDropDownList($model, 'status', Helper::$payment_list, array(
                'encode'=>'false',
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>$this->createUrl('/admin/orders/ajaxstatus'),
                    'data'=>'js:{
                        "order_id":'.$model->id.',
                        "status":this.value
                    }',
                    'beforeSend'=>'js:function(){$("#status_info").addClass("loader2")}',
                    'success'=>'js:function(){$("#status_info").removeClass("loader2").html("<i style=\"color: green;\" class=\"icon2-checkmark\"></i>")}',
                ),
            )) ;
        ?>
            <span class="add-on"><div id="status_info"></div></span>

        </div>
    </div>
</div>

<div class="span12">
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
</div>
</div>