<?php /* @var $this Controller */ ?>
<?php
if($model == null) {
?>
    <div class="well-small">
        <p class='text-error text-center'>Внимание. Вы не указали адрес доставки.</p>
        <p><?php
                echo CHtml::link('Указать адрес доставки и дополнительные данные.', array('/user/profile/addr'), array('class'=>'btn')) ;
            ?></p>
    </div>
<?php
} else {
?>
<div class="well">
    <address>
        <strong>Адрес доставки.</strong><div class="pull-right"><?php echo CHtml::link("<i class='icon-edit'></i> редактировать", array('/user/profile/addr_edit')) ; ?></div><br />
        <?php echo $model->indx; ?> <br />
        <?php echo $model->region.", ".$model->city; ?><br />
        <?php echo $model->adds; ?><br />
        <abbr title="Номер телефона">P:</abbr><?php echo $model->phone; ?>
    </address>

    <address>
        <strong>Дополнительно.</strong><br />
        ICQ: <?php echo $model->icq; ?> <br />
        Skype: <?php echo $model->skype; ?> <br />
    </address>
</div>

<?php } ?>