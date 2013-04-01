<?php
/* @var $this AttributegroupController */
/* @var $model AttributeGroup */
?>

<legend>Просмотр группы: <strong><?php echo $model->name ; ?></strong></legend>

<div class="row-fluid">
    <div class="span1">
        <br />
        <?php
        $link = array('/admin/attributegroup/admin') ;
        //$link = $link + array('id'=>$model->attribute_group_id) ;
        echo CHtml::link("<i class='icon2-arrow-left-3' style='font-size: 57px;'></i>", $link);
        ?>

    </div>
    <div class="span10">
        <div class="well">
            <p>Списко аттрибутов, входящих в группу:</p>
            <?php

            $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$value,
                'columns'=>array(
                    array(
                        'name'=>'id',
                        'header'=>'ID',
                    ),
                    array(
                        'name'=>'name',
                        'header'=>'Название',
                        'type'=>'html',
                        'value'=>'CHtml::link($data["name"], array("/admin/attribute/update", "id"=>$data["id"]))',
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/attribute/delete", array("id"=>$data["id"]))',
                        'template'=>'{delete}',
                    ),
                ),
            ));


            echo CHtml::link("Добавить аттрибут", array("/admin/attribute/create", "id"=>$model->id), array('class'=>'btn btn-primary')) ;
            ?>
        </div>    <!-- well -->
    </div>        <!-- span8 -->
</div>

