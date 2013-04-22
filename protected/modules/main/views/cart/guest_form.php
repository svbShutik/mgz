<?php
/* @var $this CartController */
/* @var $model Guest */
/* @var $form CActiveForm */
?>

<div class="span12">
<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guest-form-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Все поля обязательны для заполнения.</p>

        <?php
            echo $form->errorSummary(array($model, $order), null,null,array('class'=>'alert alert-error alert-block')); ?>

    <div class="control-group">
		<?php echo $form->labelEx($model,'fio'); ?>
		<?php echo $form->textField($model,'fio'); ?>
    </div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
    </div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'adres'); ?>
		<?php echo $form->textArea($model,'adres', array('rows'=>'4', 'class'=>'input-xlarge')); ?>
    </div>

    <label class="radio">
        <?php echo $form->labelEx($order,'delivery'); ?>
        <?php echo $form->radioButtonList($order,'delivery',CHtml::listData(Delivery::model()->findAll(),'id','title'), array('separator'=>'', 'ajax'=>array(
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

