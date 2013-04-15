<?php
/* @var $this CartController */
/* @var $model Guest */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guest-form-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Все поля обязательны для заполнения.</p>

        <?php
            echo $form->errorSummary($model, null,null,array('class'=>'alert alert-error alert-block')); ?>

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
		<?php echo $form->textArea($model,'adres'); ?>
    </div>

    <div class="control-group">
		<?php echo CHtml::submitButton('Продолжить', array('class'=>'btn')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->