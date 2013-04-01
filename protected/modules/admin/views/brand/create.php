<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Brands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список брендов', 'url'=>array('index')),
	array('label'=>'Редактирование брендов', 'url'=>array('admin')),
);
?>

<h1>Create Brand</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>