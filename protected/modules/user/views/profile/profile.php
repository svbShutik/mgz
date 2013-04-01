<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");

//Правая меню - column2.php
$this->menu = array(
    //
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    //array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);

$admin = array(
    //((UserModule::isAdmin())
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    /*((UserModule::isAdmin())
        ?array('label'=>'Редактирование ролей', 'url'=>array('/rights'))
        :array()),*/
) ;

if(UserModule::isAdmin()) {
    $this->menu = array_merge($admin, $this->menu) ;
}
?>

<legend style="color: #679a06">Профиль пользователя</legend>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>

<?php

endif;
// Основное инфо о пользователе
echo $this->renderPartial('_usrinfo', array('model'=>$model, 'profile'=>$profile)) ;

// Адрес доставки и доп.данные
echo $this->renderPartial('_addr', array('model'=>$addr)) ;
?>
