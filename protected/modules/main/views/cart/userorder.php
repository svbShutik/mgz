<?php
/* @var $this CartController */
/* @var $order Order */
/* @var $form CActiveForm */
?>

<legend>Выбирите способ доставки</legend>

<div class="row-fluid">
<div class="span5">
    <div class="span12">
    <div class="form-horizontal">

        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'userorder-form',
        'enableAjaxValidation'=>false,
    )); ?>

        <?php
        echo $form->errorSummary($order, null,null,array('class'=>'alert alert-error alert-block')); ?>

        <label class="radio">
            <?php echo $form->radioButtonList($order,'delivery',CHtml::listData(Delivery::model()->findAll(),'id','title'), array('separator'=>'','ajax'=>array(
                'type'=>'POST',
                'url'=>$this->createUrl('/main/cart/totalprice'),
                'success'=>' function(data) { $(\'.TotalPrice\').html(data) }',
                ),
            'return'=>true, // иначе не переключается radioButton
        )) ; ?>

        </label>

        <div class="control-group">
            <?php echo CHtml::submitButton('Продолжить', array('class'=>'btn btn-success')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
    </div>
    <div class="span12">
        <div class="TotalPrice">
            <p>Итого с доставкой:</p>
        </div>
    </div>
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


