<div class="span3">
    <div class="cart">
        <i class="icon2-cart-2"></i>
    </div>
</div>

<div class="span9">
    <div class="span12" style="padding-top: 12px" id="cartContainer">
        <?php echo CHtml::link('Моя корзина',array('/main/cart'), array('id'=>'cartLink'));?>
    </div>

    <div class="span12" style="margin-left: 0px;">
        <div id="cart-count">
            <strong>
                <?php
                echo Yii::app()->shoppingCart->getItemsCount() ;
                ?>
            </strong>
            <span>шт.</span>
        </div>
    </div>


</div>