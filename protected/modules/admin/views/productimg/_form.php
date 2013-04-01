<?php
/* @var $this ProductimgController */
/* @var $model ProductImg */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-img-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->fileField($model, 'image_file') ?>
	</div>

	<div class="control-group">
		<?php
            echo $form->labelEx($model, 'sort') ;
            echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="control-group">
		<?php echo CHtml::submitButton("Добавить"); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->