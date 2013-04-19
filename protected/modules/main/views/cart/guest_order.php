<?php
/* @var $this CartController */
/* @var $model Guest */
/* @var $form CActiveForm */
?>

<legend>Оформление заказа</legend>

<div class="row-fluid">
    <div class="span5">
        <?php
        $this->renderPartial('guest_form', array('model'=>$model, 'order'=>$order)) ;
        ?>
    </div>

    <div class="span7">
        <div class="well well-small">
            <dl>
                <?php
                    $delivery = Delivery::model()->findAll() ;
                    foreach($delivery as $item){
                        echo "<dt>".$item->title." - стоимость ".$item->price." руб.:</dt>";
                        echo "<dd>".$item->desc."</dd>";
                    }
                ?>
            </dl>
        </div>
    </div>
</div>


