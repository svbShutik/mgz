<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/icon_metro.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slimbox2.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/alertify.core.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/alertify.default.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="page">
    <div class="wrp">
        <div class="affix-top print_hide">
            <div class="top-padding"></div>
            <div class="row-fluid">
                <div class="span2">
                    <?php echo CHtml::link(CHtml::image('/img/logo.jpg','SvbShop - магазин очешуительных товаров по низкой цене'), array("/main/default"), array('id'=>'logo', 'class'=>'logo')) ; ?>
                </div>
                <div class="span4 offset6">

                    <div class="span6" id="cart-block">
                        <?php
                            $this->widget('application.components.cart');
                        ?>
                    </div>

                    <div class="span6" id="user-block">
                        <?php if (!Yii::app()->user->isGuest) {
                            echo CHtml::link("<i class='icon2-user'></i> Пользователь",array('/main/home'))."<br>" ;
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

            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">

                        <?php echo CHtml::link('SvbShop', array('/main/default'), array('class'=>'brand'));?>

                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>

                        <div class="nav-collapse">
                            <ul class="nav">
                                <li class="divider-vertical"></li>
                                <li><a href="#">Новые товары</a></li>
                                <li class="dropdown">
                                    <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Сервис<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                        <li><a href="#">Доставка</a></li>
                                        <li><?php echo CHtml::link('Оплата заказов', array('/main/payment/index'));?></li>
                                        <li class="divider"></li>
                                        <li><a href="#">О нас</a></li>
                                    </ul>
                                </li>
                            </ul>


                            <?php $this->widget('SearchBlock'); ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <?php echo $content; ?>

    </div>
</div>
<div id="arrupmain">
    Наверх
</div>
<div class="footer">
    <div class="footer_copy">
        <p>&copy; Павел Петроf, <?php echo date('Y');?>г.</p>
    </div>
</div>
<!---
    <script  src="http://code.jquery.com/jquery-latest.js"></script>
-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tooltip.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-popover.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/slimbox2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/alertify.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/application.js"></script>

</body>
</html>
