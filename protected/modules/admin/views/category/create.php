<?php
/* @var $this DefaultController */
/* @var $model Category */
?>
<legend>Добавить новую категорию</legend>

<div class="row-fluid">
    <div class="span1">
        <br />
        <?php
        $link = array('/admin/category') ;
        if($_GET['id'] !='') {
            $link = $link + array('id'=>$_GET['id']) ;
        }
        echo CHtml::link("<i class='icon2-arrow-left-3' style='font-size: 57px;'></i>", $link);
        ?>

    </div>
    <div class="span10">
        <div class="well">
            <?php echo $this->renderPartial('_form', array('model'=>$model)) ; ?>
        </div>    <!-- well -->
    </div>        <!-- span8 -->
</div>