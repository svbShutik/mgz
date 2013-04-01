<?php
/* @var $this AttributevalueController */
/* @var $model AttributeValue */

$this->breadcrumbs=array(
	'Attribute Values'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AttributeValue', 'url'=>array('index')),
	array('label'=>'Create AttributeValue', 'url'=>array('create')),
	array('label'=>'Update AttributeValue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AttributeValue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AttributeValue', 'url'=>array('admin')),
);
?>

<h1>View AttributeValue #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'attribute_id',
		'value',
	),
)); ?>
