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
                <div class="span2 logo">
                    <?php echo CHtml::link("<img src='/img/logo.jpg'>", array("/main/default"), array('id'=>'logo', 'class'=>'logo')) ; ?>

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
                    <ul class="nav">
                        <li><?=CHtml::link('На главную', array('/main/default')) ; ?></li>
                        <li class="divider-vertical"></li>
                        <li><a href="#">Новые товары</a></li>
                        <li><a href="#">Специальные предложения</a></li>
                        <li><a href="#">Доставка</a></li>
                    </ul>

                    <div class="pull-right">
                        <ul class="nav">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">О нас</a></li>
                            <?php
                            if(Yii::app()->user->isAdmin()) {
                                echo "<li>".CHtml::link("Admin", array("/admin/index"))."<li>" ;
                            }
                            ?>
                        </ul>
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
        <p>&copy; Павел Петроf, 2013</p>
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
