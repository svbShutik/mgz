<p><strong>ФИО:</strong> <?php echo $user->profile->lastname." ".$user->profile->firstname ;?></p>
<p><strong>Email:</strong> <?php echo CHtml::mailto($user->email, $user->email) ;?></p>
    <address>
        <strong>Адрес доставки.</strong><br>
        <?php echo $user->addr->indx; ?> <br />
        <?php echo $user->addr->region.", ".$user->addr->city; ?><br />
        <?php echo $user->addr->adds; ?><br />
        <abbr title="Номер телефона">P:</abbr><?php echo $user->addr->phone; ?>
    </address>

    <address>
        <strong>Дополнительно.</strong><br />
        ICQ: <?php echo $user->addr->icq; ?> <br />
        Skype: <?php echo $user->addr->skype; ?> <br />
    </address>