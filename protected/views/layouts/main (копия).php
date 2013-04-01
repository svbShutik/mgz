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
        <div class="affix-top">
            <div class="top-padding"></div>
            <div class="row-fluid">
                <div class="span2">
                    <?php echo CHtml::link("<img src='\img\logo.png'>", array("/main/default")) ; ?>

                </div>
                <div class="span4 offset6">

                    <div class="span6">

                    </div>
                    
                    <div class="span6">

                    </div>
                    <!--- BEGIN Блок корзины -->
                        <div class="top-block" id="cart-block">
                            <?php
                            $this->widget('application.components.cart');
                            ?>
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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/application.js"></script>

</body>
</html>
