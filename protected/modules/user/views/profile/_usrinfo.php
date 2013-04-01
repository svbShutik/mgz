<?php /* @var $this Controller */ ?>
    <table class="table">
        <tr>
            <th><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
            <td><?php echo CHtml::encode($model->username); ?></td>
        </tr>
        <?php
        $profileFields=ProfileField::model()->forOwner()->sort()->findAll();
        if ($profileFields) {
            foreach($profileFields as $field) {
                //echo "<pre>"; print_r($profile); die();
                ?>
                <tr>
                    <th><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
                    <td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
                </tr>
                <?php
            }//$profile->getAttribute($field->varname)
        }
        ?>
        <tr>
            <th><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
            <td><?php echo CHtml::encode($model->email); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
            <td><?php echo $model->lastvisit_at; ?></td>
        </tr>
    </table>