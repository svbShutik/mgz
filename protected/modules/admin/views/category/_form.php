<div class="form-horizontal">
    <?php
    Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
    echo CHtml::beginForm() ?>
    <?php
    if(CHtml::errorSummary($model)) {
        echo "<div class='alert alert-error alert-block'>" ;
        echo CHtml::errorSummary($model);
        echo "</div>";
    }
    ?>

    <div class="control-group">
        <?php echo CHtml::activeLabel($model,'title'); ?>
        <?php echo CHtml::activeTextField($model,'title'); ?>
        <?php echo CHtml::error($model,'title'); ?>
    </div>

    <div class="control-group">
        <?php
        $this->widget('ImperaviRedactorWidget', array(
            'model'=> $model,
            'attribute'=>'memo',

            'options'=> array(
                'lang'=>'ru',
                //'toolbar'=>true,
                //'iframe'=>true,
            ),
        )) ;
        ?>
    </div>

    <div class="control-group">
        <?php echo CHtml::activeLabel($model,'active'); ?>
        <?php echo CHtml::activeDropDownList($model,'active', Helper::$active_list) ?>
        <?php echo CHtml::error($model,'active'); ?>
    </div>

    <div class="control-group">
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php CHtml::endForm() ?>

</div><!-- form -->