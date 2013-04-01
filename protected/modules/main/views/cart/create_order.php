<legend>Доставка:</legend>
<div class="row-fluid">
    <div class="span12">
        <div class="span6">
            <address>
                <?php echo CHtml::encode($user->profile->firstname." ".$user->profile->lastname)." (".$user->username.")";?><br />
                <strong>Адрес доставки:</strong><br />
                <?php echo CHtml::encode($user->addr->indx);?><br />
                <?php echo CHtml::encode($user->addr->region.", ".$user->addr->city);?><br />
                <?php echo CHtml::encode($user->addr->adds);?><br />
                <abbr title="Номер телефона">P:</abbr><?php echo CHtml::encode($user->addr->phone);?><br />
            </address>
        </div>

        <div class="span6">

        </div>
    </div>
    <div class="pull-right">
        <?php echo CHtml::link('Создать заказ', array('/main/cart/payment'), array('class'=>'btn btn-success'));?>
    </div>
</div>


