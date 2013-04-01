<div id="cartTips" class="cartTips">
    <div class="popoverbottom">
        <div class="arrow"></div>
        <h3 class="popover-title">Корзина</h3>
        <div class="popover-content">
            <?php
            if(isset($data)) {
                foreach($data as $position){
                    echo "<p>".$position->title."</p>" ;
                }
            }
            ?>
        </div>
    </div>
</div>

