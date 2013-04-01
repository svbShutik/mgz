<?php
/* @var $this AttributevalueController */
/* @var $model AttributeValue */

$this->breadcrumbs=array(
	'Attribute Values'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AttributeValue', 'url'=>array('index')),
	array('label'=>'Create AttributeValue', 'url'=>array('create')),
	array('label'=>'View AttributeValue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AttributeValue', 'url'=>array('admin')),
);
?>

<h1>Update AttributeValue <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>