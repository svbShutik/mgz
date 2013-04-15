<?php
/* @var $this CartController */
/* @var $model Guest */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guest-form-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Все поля обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->labelEx($model,'fio'); ?>
		<?php echo $form->textField($model,'fio'); ?>
		<?php echo $form->error($model,'fio'); ?>

		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>

		<?php echo $form->labelEx($model,'adres'); ?>
		<?php echo $form->textArea($model,'adres'); ?>
		<?php echo $form->error($model,'adres'); ?>

		<?php echo CHtml::submitButton('Submit'); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->