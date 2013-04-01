<?php
/* @var $this AttributegroupController */
/* @var $model AttributeGroup */

$this->breadcrumbs=array(
	'Attribute Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AttributeGroup', 'url'=>array('index')),
	array('label'=>'Manage AttributeGroup', 'url'=>array('admin')),
);
?>

<h1>Create AttributeGroup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>