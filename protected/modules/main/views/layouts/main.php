<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/icon_metro.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="page">
    <div class="wrp">
        <div class="top-padding"></div>
        <div class="row-fluid print_hide">
            <div class="span2">
                <img src="\img\logo.png">
            </div>
            <div class="span4 offset6">
                <!--- BEGIN Блок корзины -->
                    <div class="top-block">
                        <img src="\img\shopping.gif" width="24" height="24" class="shopping">
                        <p><?php echo CHtml::link('Моя корзина',array('/main/cart'))?></p>
                        <p>
                            <strong>999</strong>
                            <span>шт.</span>
                        </p>
                    </div>
                <!--- END Блок корзины -->

                <!--- BEGIN USER BLOCK -->
                <div class="user-block">
                    <?php if (!Yii::app()->user->isGuest) {
                    echo CHtml::link("<i class='icon2-user'></i> Пользователь",array('/user/profile'))."<br>" ;
                    echo CHtml::link("<i class='icon2-exit'></i> Выход",array('/user/logout')) ;
                } else {
                    echo CHtml::link("<i class='icon2-user'></i> Войти",array('/user/login'))."<br>" ;
                    echo CHtml::link("<i class='icon2-exit'></i> Регистрация",array('/user/registration')) ;
                }
                    ?>
                </div>

                <!--- END USER BLOCK -->

            </div>
        </div>
        <div class="top-padding"></div>

        <div class="navbar print_hide">
            <div class="navbar-inner">
                <ul class="nav">
                    <li><?=CHtml::link('На главную', array('/main/default')) ; ?></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#">Новые товары</a></li>
                    <li><a href="#">Специальные предложения</a></li>
                    <li><a href="#">Доставка</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">О нас</a></li>
                </ul>

                <form class="navbar-search pull-right">
                    <input type="text" class="search-query" placeholder="Поиск">
                </form>
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
