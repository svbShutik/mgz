<?php
/* @var $this BrandController */
/* @var $data Brand */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img_url')); ?>:</b>
	<?php echo CHtml::image(Brand::BRAND_IMG_DIR.$data->img_url,"",array('class'=>'img-polaroid', 'width'=>'150')); ?>
	<br />


</div>