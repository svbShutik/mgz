<?php /* @var $this Controller */ ?>
<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");

$this->menu = array(
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);

$admin = array(
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
) ;

if(UserModule::isAdmin()) {
    $this->menu = array_merge($admin, $this->menu) ;
}

?><legend><h1>Адрес доставки и доп.данные</h1></legend>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php
endif;
$this->renderPartial('addr_edit', array('model'=>$model)) ;
?>
