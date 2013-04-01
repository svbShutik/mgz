<?php
/* @var $this AttributevalueController */
/* @var $model AttributeValue */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attribute-value-form',
	'enableAjaxValidation'=>false,
    //'htmlOptions'=>array('class'=>'form-inline'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo CHtml::activeHiddenField($model, 'attribute_id', array('id'=>'attribute_val_id')) ;?>

    <div class="control-group">
    <?php
        $product_categoru_id = Cookie::get('product_categoru_id') ;
        echo CHtml::activeLabel($model, 'attribute_id', array('for'=>'attribute_name', 'class'=>'control-label')) ;

        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'attribute_name',
            //'source'=>Yii::app()->createUrl('/admin/attribute/attributelist'),
            'source'=>'js:function(request, response){
                $.getJSON("'.$this->createUrl('/admin/attribute/attributelist').'",{
                term: request.term.split(/,s*/).pop(),
                attribute_group: "'.$product_categoru_id.'"
                }, response);
            }',
            'options'=>array(
                'minLength'=>'2',
                'showAnim'=>'fold',
                'select' =>'js: function(event, ui) {
                                this.value = ui.item.value;
                                $("#attribute_val_id").val(ui.item.id);
                            return false;
                            }',
            ),
            'htmlOptions'=>array(
                'class'=>'controls',
            ),
        )) ;
    ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'value', array('class'=>'control-label')); ?>
        <?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>150), array('class'=>'controls')); ?>
        <?php echo $form->error($model,'value'); ?>
    </div>


	<div class="control-group">
		<?php echo CHtml::submitButton("Добавить"); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->