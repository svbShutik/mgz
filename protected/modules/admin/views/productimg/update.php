<?php
/* @var $this ProductimgController */
/* @var $model ProductImg */

$this->breadcrumbs=array(
	'Product Imgs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductImg', 'url'=>array('index')),
	array('label'=>'Create ProductImg', 'url'=>array('create')),
	array('label'=>'View ProductImg', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductImg', 'url'=>array('admin')),
);
?>

<h1>Update ProductImg <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>