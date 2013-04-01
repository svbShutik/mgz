<?php
/* @var $this AttributegroupController */
/* @var $model AttributeGroup */
?>

<legend>Управление группами атрибутов</legend>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attribute-group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
));


echo CHtml::link("Добавить группу", array("/admin/attributegroup/create"), array('class'=>'btn btn-primary')) ;
?>
