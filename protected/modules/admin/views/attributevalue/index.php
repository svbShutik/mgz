<?php
/* @var $this AttributevalueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Attribute Values',
);

$this->menu=array(
	array('label'=>'Create AttributeValue', 'url'=>array('create')),
	array('label'=>'Manage AttributeValue', 'url'=>array('admin')),
);
?>

<h1>Attribute Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
