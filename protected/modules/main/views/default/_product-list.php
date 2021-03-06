<?php foreach($items->getData() as $itit => $item): ?>
<div class="span6">
    <div class="span4">
    <?php
        //Картинка
        echo "<div class='img'>" ;
            $img = ProductImg::model()->getFirstImage($item['id']) ;
            echo CHtml::link(CHtml::image($img, $item['title']),$img, array('rel'=>'lightbox', 'title'=>$item['title'])) ;
        echo "</div>" ;
    ?>
    </div>

    <div class="span8">
        <div class="span12">
            <?php echo CHtml::link($item['title'], array('/main/view', 'numiid'=>$item['id']), array('class'=>'name'))."<br>" ; ?>
        </div>
        <div class="span12" style="margin-left: 0px;">
            <?php
                echo "<div class='price'>".$item['price']." руб.</div>" ;
            ?>
        </div>
        <div class="span12 print_hide" style="margin-left: 0px;">
            <?php
            echo CHtml::link("В корзину", array('#'), array('id'=>$item['id'], 'class'=>'btn btn-mini btn-info', 'rel'=>'buy_ajax','tooltip'=>'popover', 'data-original-title'=>'Добавить товар в корзину', 'data-placement'=>'bottom')) ;
                if(!Yii::app()->user->isGuest) {
                    echo CHtml::link("<i class='icon2-bookmark-2'></i>", array('#'), array('class'=>'btn btn-mini btn-warning', 'tooltip'=>'popover', 'data-original-title'=>'Добавить товар в закладки', 'data-placement'=>'bottom')) ;
                }
            ?>
        </div>
    </div>
</div>
<?php endforeach; ?>