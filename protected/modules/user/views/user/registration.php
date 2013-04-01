<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration"); ?>

<?php if(Yii::app()->user->hasFlash('registration')): ?>

<div class="alert alert-success">
    <?php echo Yii::app()->user->getFlash('registration'); ?>
</div>

<?php else: ?>

<div class="row-fluid">

        <?php $form=$this->beginWidget('UActiveForm', array(
            'id'=>'registration-form',
            'enableAjaxValidation'=>true,
            'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
            'htmlOptions' => array('enctype'=>'multipart/form-data', "class"=>"form-horizontal"),
        )); ?>

            <legend><h1><?php echo UserModule::t("Registration"); ?></h1></legend>

            <p class="text-info"><span class="required">*</span> Все поля обязательны для заполнения.</p>

            <?php echo $form->errorSummary(array($model,$profile),"","",array("class"=>"alert alert-error")); ?>

    <div class="span7 offset2">
            <div class="control-group">
            <?php echo $form->label($model,'username', array("class"=>"control-label", "for"=>"inputUsername")); ?>
            <div class="controls">
                <?php echo $form->textField($model,'username', array("id"=>"inputUsername")); ?>
                <?php echo $form->error($model,'username', array("class"=>"text-error")); ?>
            </div>
            </div>

            <div class="control-group">
            <?php echo $form->label($model,'password',array("class"=>"control-label", "for"=>"inputPassword")); ?>
            <div class="controls">
                <?php echo $form->passwordField($model,'password', array("id"=>"inputPassword")); ?>
                <?php echo $form->error($model,'password', array("class"=>"text-error")); ?>
                <p class="muted">
                    <small>
                        <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
                    </small>
                </p>
            </div>
            </div>

            <div class="control-group">
            <?php echo $form->label($model,'verifyPassword', array("class"=>"control-label", "for"=>"inputVerPassword")); ?>
                <div class="controls">
                    <?php echo $form->passwordField($model,'verifyPassword', array("id"=>"inputVerPassword")); ?>
                    <?php echo $form->error($model,'verifyPassword', array("class"=>"text-error")); ?>
                </div>
            </div>

            <div class="control-group">
            <?php echo $form->label($model,'email',array("class"=>"control-label", "for"=>"inputEmail")); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'email', array("id"=>"inputEmail")); ?>
                    <?php echo $form->error($model,'email',array("class"=>"text-error")); ?>
                </div>
            </div>

        <?php
                $profileFields=$profile->getFields();
                if ($profileFields) {
                    foreach($profileFields as $field) {
                    ?>
                <div class="control-group">
                    <?php echo $form->label($profile,$field->varname,array("class"=>"control-label", "for"=>"input"+$field->varname)); ?>
                    <div class="controls">
                        <?php
                        if ($widgetEdit = $field->widgetEdit($profile)) {
                            echo $widgetEdit;
                        } elseif ($field->range) {
                            echo $form->dropDownList($profile,$field->varname,Profile::range($field->range),array("id"=>"input"+$field->varname));
                        } elseif ($field->field_type=="TEXT") {
                            echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50, "id"=>"input"+$field->varname));
                        } else {
                            echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255), "id"=>"input"+$field->varname));
                        }
                         ?>
                        <?php echo $form->error($profile,$field->varname, array("class"=>"text-error")); ?>
                    </div>
                </div>
                    <?php
                    }
                }
        ?>
            <?php if (UserModule::doCaptcha('registration')): ?>
            <div class="control-group">
                <?php echo $form->label($model,'verifyCode', array("class"=>"control-label", "for"=>"inputVerifyCode")); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'verifyCode', array("id"=>"inputVerifyCode")); ?>
                    </br> <?php $this->widget('CCaptcha', array("buttonLabel"=>"<i class='icon-refresh'></i>")); ?>
                    <?php echo $form->error($model,'verifyCode', array("class"=>"text-error")); ?>

                    <p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
                    <?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <div class="control-group">
                <div class="controls">
                    <?php echo CHtml::submitButton(UserModule::t("Register"), array("class"=>"btn btn-success")); ?>
                </div>
            </div>

        </div>
        <?php $this->endWidget(); ?>
</div>
<?php endif; ?>