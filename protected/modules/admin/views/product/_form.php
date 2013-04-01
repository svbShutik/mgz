<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
    Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');

    $category = Category::category_name($model->category_id) ;

    echo CHtml::form() ;
    ?>

	<p class="text-info">Поля, помеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php
    if(CHtml::errorSummary($model)) {
        echo "<div class='alert alert-error'>" ;
            echo CHtml::errorSummary($model, "<strong>Необходимо исправить следующие ошибки:</strong>");
        echo "</div>" ;
    }
    ?>

	<div class="control-group">
		<?php echo CHtml::activeLabelEx($model,'title'); ?>
		<?php echo CHtml::activeTextField($model,'title',array('class'=>'input-xxlarge','maxlength'=>255)); ?>
	</div>

    <hr>
        <div class="well-small">
            <div class="control-group">
                <?php echo CHtml::activeLabelEx($model,'category_id'); ?>
                <?php echo CHtml::activeDropDownList($model,'category_id',$category, array('disabled'=>1)); ?>
            </div>

            <div class="control-group">
                <p>Можете оставить текщую категорию, или указать другую:</p>
                <?php echo CHtml::activeDropDownList($model, 'category_id',
                CHtml::listData(Category::model()->findAll(array('condition'=>'level=1', 'order'=>'lft ASC')), 'id', 'title'),
                array('prompt'=>'Выберите',
                    'onchange'=> CHtml::ajax(array('type'=>'POST',
                        'url'=>$this->createUrl('/admin/product/dynamiccat'),
                        'data' => array('uplevel_id' => 'js:$(this).val()'),
                        'update'=> '#subcat_0'))
                )
            );
                echo CHtml::activeHiddenField($model, 'category_id', array('value'=>$model->category_id));
                ?>
                <div id="subcat_0"></div>
            </div>
        </div>
    <hr>

	<div class="control-group">
		<?php echo CHtml::activeLabelEx($model,'quantity'); ?>
		<?php echo CHtml::activeTextField($model,'quantity'); ?>
	</div>

	<div class="input-append">
		<?php echo CHtml::activeLabelEx($model,'price'); ?>
		<?php echo CHtml::activeTextField($model,'price', array('id'=>'appendedInput')); ?>
        <span class="add-on">.руб</span>
	</div>

	<div class="control-group">
		<?php echo CHtml::activeLabelEx($model,'brand_id'); ?>
        <?php echo CHtml::activeDropDownList($model, 'brand_id', Brand::model()->getBrandType(),array('empty'=>'Можете выбрать бренд')); ?>
	</div>

	<div class="control-group">
		<?php echo CHtml::activeLabelEx($model,'active'); ?>
		<?php echo CHtml::activeDropDownList($model, 'active', Helper::$active_list) ?>
	</div>

    <div class="control-group">
        <?php echo CHtml::activeLabelEx($model,'product_type_id'); ?>
        <?php echo CHtml::activeDropDownList($model, 'product_type_id', AttributeGroup::model()->getProductType(),array('empty'=>'Выбирете тип продукта')); ?>
    </div>

    <div class="control-group">
    <p>Описание товара:</p>
        <?php
        $this->widget('ImperaviRedactorWidget', array(
            'model'=> $model,
            'attribute'=>'desc',

            'options'=> array(
                'lang'=>'ru',
                //'toolbar'=>true,
                //'iframe'=>true,
            ),
        )) ;
        ?>
    </div>






    <div class="rinput-append">
		<?php echo CHtml::submitButton('Далее ...', array('class'=>'btn btn-primary')); ?>
	</div>

<?php CHtml::endForm() ?>

</div><!-- form -->