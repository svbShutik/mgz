<?php /* @var $this Controller */ ?>
<?php
$this->pageTitle=Yii::app()->name;

echo CHtml::ajaxLink('Добавить1',array('site/index', 'id'=>'1'),array('type'=>'get','update'=>'#upd')) ;
echo CHtml::ajaxLink('Добавить2',array('site/index', 'id'=>'2'),array('type'=>'get','update'=>'#upd')) ;
echo CHtml::ajaxLink('Добавить3',array('site/index', 'id'=>'3'),array('type'=>'get','update'=>'#upd')) ;
echo CHtml::ajaxLink('Добавить4',array('site/index', 'id'=>'4'),array('type'=>'get','update'=>'#upd')) ;

?>

<div id="upd">
</div>

<div class="well">
    <?php
    echo CHtml::link('Панель администрирования', array('/admin/index'), array('class'=>'btn'))."<br />" ;
    ?>
</div>

