<?php
/* @var $this PaymentFormController */
/* @var $model PaymentForm */
/* @var $form CActiveForm */
?>

<div class="form-inline">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-form-payment-form',
	'enableAjaxValidation'=>false,
)); ?>
	    <label>Введите номер заказа:</label>
		<?php echo $form->textField($model,'order'); ?>

		<?php echo CHtml::submitButton('Перейти к оплате',array('class'=>'btn btn-success')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->