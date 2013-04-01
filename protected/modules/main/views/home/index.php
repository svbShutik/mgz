<legend style="color: #679a06">Личный кабинет</legend>
    <div class="row-fluid">
        <div class="span9">
            <h4>Список заказов:</h4>
            <?php
                if(count($dataProvider)) {
                    $this->renderPartial('_item', array('items'=>$dataProvider), false, false) ;
                }


                if(isset($pages)) {
                    echo "<div class='pagination pagination-centered'>";
                    $this->widget('CLinkPager', array('pages' => $pages, 'header'=>'', 'cssFile'=>false));
                    echo "</div>";
                }
            ?>

        </div>



        <div class="span3 print_hide">
            <div class="well well-small">
                <?php echo CHtml::link('Профиль',array('/user/profile'), array('class'=>'btn btn-info btn-block'));?>
            </div>
        </div>
    </div>
