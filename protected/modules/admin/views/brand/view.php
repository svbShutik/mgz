<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список брендов', 'url'=>array('index')),
	array('label'=>'Добавить бренд', 'url'=>array('create')),
	array('label'=>'Правка', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Редактирование брендов', 'url'=>array('admin')),
);
?>

<h1>View Brand #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'desc',
		array(
            'label'=>'Лого',
            'type'=>'raw',
            'value'=>CHtml::image(Brand::BRAND_IMG_DIR.$model->img_url,"",array('width'=>'150','class'=>'img-polaroid')),
        ),
	),
)); ?>
