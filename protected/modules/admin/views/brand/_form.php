<?php
/* @var $this BrandController */
/* @var $model Brand */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'brand-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_url'); ?>
		<?php echo $form->hiddenField($model,'img_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img_url'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php

    $this->endWidget();

    echo CHtml::image("","",array('width'=>'150', 'id'=>'img_brand', 'class'=>'img-polaroid')) ;
?>
</div><!-- form -->
<?

echo "Картинка бренда сохраняется в: ".$folder = dirname(Yii::app()->request->scriptFile).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'brand_img'.DIRECTORY_SEPARATOR ;
$this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
        'id'=>'uploadFile',
        'config'=>array(
            //'debug'=>true,
            'action'=>Yii::app()->createUrl('/admin/brand/upload'),

            'allowedExtensions'=>array("jpg", "jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
            'sizeLimit'=>2*1024*1024,// maximum file size in bytes
            'minSizeLimit'=>100,
            //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
            'onComplete'=>"js:function(id, fileName, responseJSON){
                $('img#img_brand').attr('src','".Brand::BRAND_IMG_DIR."'+fileName) ;
                $('#Brand_img_url').val(fileName) ;
                alert(fileName);
            }",
            /*'messages'=>array(
                              'typeError'=>"{file} имеет неправильное расширение. Разрешены только {extensions}.",
                              'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                              'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                              'emptyError'=>"{file} is empty, please select files again without it.",
                              'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                             ),
            'showMessage'=>"js:function(message){ alert(message); }"*/
        )
    ));
?>
<br>
<p><a href="http://toplogos.ru/" target="_blank" class="btn">Сайт - База данных логотипов различных брендов!</a></p>