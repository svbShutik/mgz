<?php
    if(Yii::app()->user->hasFlash('order_error')) {
        echo "<div class='alert alert-error'>";
        echo "<a href='#' class='close' data-dismiss='alert'>&times;</a>";
            echo Yii::app()->user->getFlash('order_error') ;
        echo "</div>";
    }

    if(CHtml::error($form,'order')) {
        echo "<div class='alert alert-error'>";
        echo "<a href='#' class='close' data-dismiss='alert'>&times;</a>";
            echo CHtml::error($form,'order') ;
        echo "</div>";
    }
?>

<div class="row-fluid">
    <div class="span8 offset2">
        <div class="print_hide">
            <?php $this->renderPartial('_form', array('model'=>$form)) ;?>
        </div>
    </div>

    <?php
    if(isset($order)):
    ?>
        <div class="span12">
            <h3>Оплата заказа <strong style="color: #c43c35;">№<?php echo $order->order_key ; ?></strong></h3>
        </div>

        <div class="span4">
            <div class="well well-small">
                <h5>Информация о заказе:</h5>
                <p>Дата заказа: <?php echo date('d.m.Y',$order->create_time);?></p>
                <p>Сумма к оплате: <strong><?php echo $order->pay ; ?> руб.</strong></p>

            </div>
        </div>

    <?php endif ;?>
</div>