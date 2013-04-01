<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login"); ?>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="alert alert-success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<div class="row-fluid">

        <?php echo CHtml::beginForm("","post",array("class"=>"form-horizontal")); ?>

            <legend><h1><?php echo UserModule::t("Login"); ?></h1></legend>

            <?php echo CHtml::errorSummary($model,"","",array("class"=>"alert alert-error")); ?>

    <div class="span6 offset2">
            <div class="control-group">
                <?php echo CHtml::activeLabelEx($model,'username', array("class"=>"control-label", "for"=>"inputEmail")); ?>
                <div class="controls">
                    <?php echo CHtml::activeTextField($model,'username', array("id"=>"inputEmail")) ?>
                </div>
            </div>

            <div class="control-group">
                <?php echo CHtml::activeLabelEx($model,'password', array("class"=>"control-label", "for"=>"inputPassword")); ?>
                <div class="controls">
                    <?php echo CHtml::activePasswordField($model,'password', array("id"=>"inputPassword")) ?>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?> Запомнить меня
                    </label>
                    <?php echo CHtml::submitButton(UserModule::t("Login"),array("class"=>"btn btn-success")); ?>
                </div>
            </div>

        <?php echo CHtml::endForm(); ?>
    </div>
</div>


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>