<?php
/* @var $this ProductimgController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Imgs',
);

$this->menu=array(
	array('label'=>'Create ProductImg', 'url'=>array('create')),
	array('label'=>'Manage ProductImg', 'url'=>array('admin')),
);
?>

<h1>Product Imgs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
