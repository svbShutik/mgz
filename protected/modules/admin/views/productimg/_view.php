<?php
/* @var $this ProductimgController */
/* @var $data ProductImg */
?>

<div class="view">
    <?php $dirnam = Productimg::PRODUCT_IMG_DIR.DIRECTORY_SEPARATOR.$data->product_id ; ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img_file')); ?>:</b>
	<?php echo CHtml::image($dirnam.DIRECTORY_SEPARATOR.$data->img_file,'', array('width'=>'150')); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />


</div>