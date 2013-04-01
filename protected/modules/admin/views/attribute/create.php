<?php
/* @var $this AttributeController */
/* @var $model Attribute */
?>

<legend>Создание атрибута</legend>

<div class="row-fluid">
    <div class="span1">
        <br />
        <?php
        $link = array('/admin/attributegroup/view') ;
        $link = $link + array('id'=>$model->attribute_group_id) ;
        echo CHtml::link("<i class='icon2-arrow-left-3' style='font-size: 57px;'></i>", $link);
        ?>

    </div>
    <div class="span10">
        <div class="well">
            <?php echo $this->renderPartial('_form', array('model'=>$model)) ; ?>
        </div>    <!-- well -->
    </div>        <!-- span8 -->
</div>