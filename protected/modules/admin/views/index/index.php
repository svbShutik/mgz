<?php
/* @var $this DefaultController */
?>
<legend>Административная панель</legend>

<?php
    echo "<p>".CHtml::link('Бранеды', array('/admin/brand'), array('class'=>'btn'))."</p>" ;
    //echo "<p>".CHtml::link('Тип продуктов', array('/admin/producttype'), array('class'=>'btn'))."</p>" ;
    echo "<p>".CHtml::link('Категории', array('/admin/category'), array('class'=>'btn'))."</p>" ;
    echo "<p>".CHtml::link('Продукты', array('/admin/product'), array('class'=>'btn'))."</p>" ;
    echo "<p>".CHtml::link('Группы атрибутов (Тип продуктов)', array('/admin/attributegroup/admin'), array('class'=>'btn'))."</p>" ;
    echo "<p>".CHtml::link('Список атрибутов', array('/admin/attribute'), array('class'=>'btn'))."</p>" ;
    echo "<p>".CHtml::link('Значения атрибутов', array('/admin/attributevalue'), array('class'=>'btn'))."</p>" ;
    echo "<p>".CHtml::link('Вид доставки', array('/admin/delivery'), array('class'=>'btn'))."</p>" ;
    echo "<p>".CHtml::link('Запросы на звонок', array('/admin/calluser'), array('class'=>'btn btn-success'))."</p>" ;
// <a href="http://corp.mamba.ru/test/promo.phtml"><img border="0" src="http://corp.mamba.ru/test/widget.phtml?id=81227" /></a>
?>
