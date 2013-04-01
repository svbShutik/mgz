<?php
/* @var $this BrandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Brands',
);

$this->menu=array(
	array('label'=>'Добавить бренд', 'url'=>array('create')),
	array('label'=>'Редактирование брендов', 'url'=>array('admin')),
);
?>

<h1>Brands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
