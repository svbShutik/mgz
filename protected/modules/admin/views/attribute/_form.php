<?php
/* @var $this AttributeController */
/* @var $model Attribute */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attribute-form',
	'enableAjaxValidation'=>true,
));?>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'attribute_group_id'); ?>
        <?php echo $form->dropDownList($model, 'attribute_group_id', AttributeGroup::getAttributeGroupList(), array('empty'=>'Выбирите групу атрибута')); ?>
		<?php echo $form->error($model,'attribute_group_id'); ?>
	</div>

	<div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->