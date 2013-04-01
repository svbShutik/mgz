<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/icon_metro.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="page">
    <div class="wrp">

        <div class="header print_hide">
        <div class="navbar">
            <div class="navbar-inner">
                <?php echo CHtml::link("Главная", array("/main/default"), array("class"=>"brand")) ;?>
                <ul class="nav">
                    <li><?php echo CHtml::link("Gii", array("/gii")) ;?></li>
                    <li><?php echo CHtml::link("Админка", array("/admin/index")) ;?></li>
                    <li><a href="#">О сервисе</a></li>
                    <li><a href="#">Связаться с нами</a></li>
                </ul>
                <div class="pull-right">
                    <?php
                    if(Yii::app()->user->isGuest): ?>
                        <?php echo CHtml::link("<i class='icon-hand-right'></i> Войти", array("/user/login"), array('class'=>'btn btn-info')) ;  ?> | <?php echo CHtml::link("<i class='icon-plus'></i> Зарегистрироваться", array("/user/registration"), array('class'=>'btn btn-info'))  ; ?>
                    <?php
                    endif;
                    if(!Yii::app()->user->isGuest): ?>
                        <?php echo CHtml::link("<i class='icon-user'></i> Личный кабинет", array("/user/profile"), array('class'=>'btn')) ;  ?> | <?php echo CHtml::link("<i class='icon-off'></i> Выход", array("/user/logout"), array('class'=>'btn'))  ; ?>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

        <?php echo $content; ?>

    </div>
</div>
<div class="footer">
    <div class="footer_copy">
        <p>&copy; Павел Петроf, 2012</p>
    </div>
</div>
<!---
    <script  src="http://code.jquery.com/jquery-latest.js"></script>
-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tooltip.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/application.js"></script>

</body>
</html>
