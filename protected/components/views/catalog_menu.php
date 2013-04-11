<div class='catalog'>

<div class="sidebar-nav">

        <ul class="nav nav-list">
            <li class="nav-header"><h5>Каталог</h5></li>
            <?php
            if(isset($back)):?>
                <li>
                    <?php
                    $link = array('/main/default') ;
                    if($back !== 'root') {
                        $link = $link + array('cid'=>$back) ;
                    }
                    echo CHtml::link("<i class='icon2-arrow-left-3'></i> Назад", $link) ;
                    ?>
                </li>
                <?php endif ;
            ?>

            <?php
            if(count($data)) {
                foreach($data as $key) {
                    echo "<li>".CHtml::link("<i class='icon2-cube-2'></i> ".$key->title, array('/main/default', 'cid'=>$key->id))."</li>" ;
                }
            }
            ?>
        </ul>

</div>

</div>