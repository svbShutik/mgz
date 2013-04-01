<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
?>
<div class="row-fluid">

    <?php echo CHtml::beginForm("","post",array("class"=>"form-horizontal")); ?>

    <legend><h1>Смена пароля</h1></legend>

    <?php echo CHtml::errorSummary($form, "","",array("class"=>"alert alert-error")); ?>

    <div class="span6 offset2">
        <div class="control-group">
            <?php echo CHtml::activeLabelEx($form,'password', array("class"=>"control-label", "for"=>"inputPassword")); ?>
            <div class="controls">
                <?php echo CHtml::activePasswordField($form,'password', array("id"=>"inputPassword")) ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo CHtml::activeLabelEx($form,'verifyPassword', array("class"=>"control-label", "for"=>"verifyPassword")); ?>
            <div class="controls">
                <?php echo CHtml::activePasswordField($form,'verifyPassword', array("id"=>"verifyPassword")) ?>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <?php echo CHtml::submitButton(UserModule::t("Save"),array("class"=>"btn btn-success")); ?>
            </div>
        </div>


    </div>

    <?php echo CHtml::endForm(); ?>
</div><!-- row-fluid -->