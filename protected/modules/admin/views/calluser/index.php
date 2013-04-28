<legend>Список запросов на обратный звонок</legend>
<?php
/* @var $this CalluserController */

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=> array(
        'id',
        'phone',
        'items',
        'call_time',
        array(
            'name'=>'create_time',
            'value'=>'date("d.m.Y (H:i:s)", $data->create_time)',
        ),
    ),
));

?>
