<?php /* @var $this Controller */ ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-addr-addr-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'indx'); ?>
		<?php echo $form->textField($model,'indx'); ?>
		<?php echo $form->error($model,'indx'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model,'region'); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adds'); ?>
		<?php echo $form->textArea($model,'adds'); ?>
		<?php echo $form->error($model,'adds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'icq'); ?>
		<?php echo $form->textField($model,'icq'); ?>
		<?php echo $form->error($model,'icq'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model,'skype'); ?>
		<?php echo $form->error($model,'skype'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Добавить', array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->