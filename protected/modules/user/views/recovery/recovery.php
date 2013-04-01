<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore"); ?>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>

<div class="alert alert-success">
    <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>

<?php else: ?>

<div class="row-fluid">

    <?php echo CHtml::beginForm("","post",array("class"=>"form-horizontal")); ?>

    <legend><h1><?php echo UserModule::t("Restore"); ?></h1></legend>

        <?php echo CHtml::errorSummary($form, "","",array("class"=>"alert alert-error")); ?>

    <div class="span6 offset2">
            <div class="control-group">
                <?php echo CHtml::activeLabel($form,'login_or_email', array("class"=>"control-label", "for"=>"inputEmail")); ?>
                <div class="controls">
                    <?php echo CHtml::activeTextField($form,'login_or_email', array("id"=>"inputEmail")) ?>
                    <p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
                    <?php echo CHtml::submitButton(UserModule::t("Restore"), array("class"=>"btn btn-success")); ?>
                </div>
            </div>
    </div>

    <?php echo CHtml::endForm(); ?>
</div><!-- row-fluid -->
<?php endif; ?>