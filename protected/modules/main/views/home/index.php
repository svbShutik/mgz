<legend style="color: #679a06">Личный кабинет</legend>
    <div class="row-fluid">
        <div class="span9">
            <h4>Список заказов:</h4>
            <table class="table">
            <?php
                //if(count($dataProvider)) {
                    //$this->renderPartial('_item', array('orders'=>$orders), false, false) ;
                //}

            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$orders,
                'itemView'=>'_item',   // refers to the partial view named '_post'
                'ajaxUpdate'=>false,
                'emptyText'=>'Заказы отсутствуют',
                'sorterHeader'=>'Сортировать по:',
                'sortableAttributes'=>array(
                    'number',
                    'create_time',
                    'price',
                ),
            ));
            ?>
            </table>

        </div>



        <div class="span3 print_hide">
            <div class="well well-small">
                <?php echo CHtml::link('Профиль',array('/user/profile'), array('class'=>'btn btn-info btn-block'));?>
            </div>
        </div>
    </div>
