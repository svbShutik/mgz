<?php
/* @var $this AttributevalueController */
/* @var $model AttributeValue */
?>

<legend>Параметры продукта</legend>

<div class="row-fluid">
    <div class="span1">
        <br />
        <?php
        $link = array('/admin/productimg/create') ;
        echo CHtml::link("<i class='icon2-arrow-left-3' style='font-size: 57px;'></i>", $link);
        ?>

    </div>
    <div class="span10">
        <div class="well">
            <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

            <pre>
                <?php print_r($list); ?>
            </pre>

            <?php
            echo CHtml::link('Продолжить', array('/admin/product/view', 'id'=>$model->product_id), array('class'=>'btn')) ;
            ?>
        </div>    <!-- well -->
    </div>        <!-- span8 -->
</div>