<?php
/* @var $this AttributegroupController */
/* @var $model AttributeGroup */

$this->breadcrumbs=array(
	'Attribute Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AttributeGroup', 'url'=>array('index')),
	array('label'=>'Create AttributeGroup', 'url'=>array('create')),
	array('label'=>'View AttributeGroup', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AttributeGroup', 'url'=>array('admin')),
);
?>

<h1>Update AttributeGroup <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>