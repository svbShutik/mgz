<?php
/* @var $this ProductimgController */
/* @var $model ProductImg */

$this->breadcrumbs=array(
	'Product Imgs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductImg', 'url'=>array('index')),
	array('label'=>'Create ProductImg', 'url'=>array('create')),
	array('label'=>'Update ProductImg', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductImg', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductImg', 'url'=>array('admin')),
);
?>

<h1>View ProductImg #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'img_file',
		'sort',
	),
)); ?>
