<?php
$this->pageTitle=Yii::app()->name . ' - Error';
?>
<div class="hero-unit">
    <h2>Тыдыыыщщщ ... Error <?php echo $code; ?></h2>
    <div class="alert alert-error">
        <?php echo CHtml::encode($message); ?>
    </div>
</div>




