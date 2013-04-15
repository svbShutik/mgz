<legend>Оформление заказа</legend>

<?php
/* @var $this CartController */
/* @var $model GuestOrder */
/* @var $form CActiveForm */
?>

<?php
$this->renderPartial('guest_form', array('model'=>$model)) ;
?>