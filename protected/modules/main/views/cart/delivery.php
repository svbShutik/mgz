<h3>Пожалуйста, выбирите способ доставки:</h3>
<div class="well">
    <?php
        echo CHtml::beginForm() ;
        foreach($model as $delivery) {
            echo "<label class='radio'>" ;
                echo CHtml::radioButton('deliveryRadios', false, array('value'=>$delivery->id))."<strong>".$delivery->title."</strong>" ;
            echo "</label>";
            echo "<div class='deliveryDesc'>";
                echo "<small>".$delivery->desc."</small>" ;
            echo "</div>";
        }
    ?>
</div>
<div class="pull-left"><?php echo CHtml::link('Назад', array('/main/cart/'), array('class'=>'btn btn-info'));?></div>
<div class="pull-right"><?php echo CHtml::submitButton('Продолжить оформление заказа', array('class'=>'btn btn-success')) ;?></div>
<?php echo CHtml::endForm() ; ?>
