<?php foreach($items as $item): ?>
<div class="span6">
    <div class="span4">
    <?php
        //Картинка
        echo "<div class='img'>" ;
            echo CHtml::image(ProductImg::model()->getFirstImage($item->id), $item->title) ;
        echo "</div>" ;
    ?>
    </div>

    <div class="span8">
        <div class="span12">
            <?php echo CHtml::link($item->title, array('/main/view', 'numiid'=>$item->id), array('class'=>'name'))."<br>" ; ?>
        </div>
        <div class="span12">
            <?php
                echo "<div class='price'>".$item->price." руб.</div>" ;
            ?>
        </div>
        <div class="span12 print_hide">
            <?php
            echo CHtml::link("В корзину", array('#'), array('id'=>$item->id, 'class'=>'btn btn-mini btn-info', 'rel'=>'popover', 'data-original-title'=>'Добавить товар в корзину', 'data-placement'=>'bottom')) ;
                if(!Yii::app()->user->isGuest) {
                    echo CHtml::link("<i class='icon2-bookmark-2'></i>", array('#'), array('class'=>'btn btn-mini btn-warning', 'rel'=>'popover', 'data-original-title'=>'Добавить товар в закладки', 'data-placement'=>'bottom')) ;
                }
            ?>
        </div>
    </div>
</div>
<?php endforeach; ?>