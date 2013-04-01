<p><i class="icon2-list"></i> КАТАЛОГ</p>
<?php
if(isset($back)):?>
<div class="back">
    <?php
        $link = array('/main/default') ;
        if($back !== 'root') {
            $link = $link + array('cid'=>$back) ;
        }
        echo CHtml::link("<i class='icon2-arrow-left-3'></i> Назад", $link) ;
    ?>
</div>
<?php endif ;
?>

<div class="catalog-list">
    <?php
    if(count($data)) {
        echo "<ul class='unstyled'>" ;
            foreach($data as $key) {
                echo "<li>".CHtml::link($key->title, array('/main/default', 'cid'=>$key->id))."</li>" ;
            }
        echo "</ul>" ;
    }
    ?>
</div>