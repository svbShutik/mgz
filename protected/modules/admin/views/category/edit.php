<?php
/* @var $this DefaultController */
/* @var $model Category */
Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
?>
<div class="row-fluid">
    <div class="span1">
        <br />
        <?php
        //TODO: Баг в NestedSetBehavior ? при изменении ноды с чайлда на рут метода isLeaf все равно определяет ноду как чайлд!
        $link = array('/admin/category') ;
        if(!$model->isRoot()) { //Если модель является дочерним узлом
            $parent = $model->parent()->find() ; // определяем предка
            if($parent->id) { //Костыль в связи с багом выше!!
                $link = $link + array('id'=>$parent->id) ; // и добавляем GET параметр к ссылке Взад
            }
        }
        echo CHtml::link("<i class='icon2-arrow-left-3' style='font-size: 57px;'></i>", $link);
        ?>

    </div>
    <div class="span10">
        <div class="well">
            <?php echo $this->renderPartial('_form', array('model'=>$model)) ; ?>
        </div>    <!-- well -->

        <?php
        if(!$model->isRoot()): ?>
            <div class="well"> <!-- Дополнительные опции -->
                <legend>Дополнительные опции</legend>
                <?php
                    echo CHtml::link('Переместить в главную категорию', array('/admin/category/MoveInRoot', 'id'=>$model->id), array('class'=>'btn')) ;
                ?>
            </div>
        <?php endif ; ?>

    </div>        <!-- span8 -->
</div>