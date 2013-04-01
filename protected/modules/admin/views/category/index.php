<?php
/* @var $this DefaultController */
/* @var $model Category */

$bread_array[] = array(
    'title'=> '<strong>Главный каталог</strong>',
    'id'=>'',
) ;

if(isset($_GET['id'])) {
    $breadcrumb = $this->loadModel($_GET['id']) ;
    $parents = $breadcrumb->ancestors()->findAll() ; // Получаем всех родителей категории
    foreach($parents as $parent) { // добавляем их в массив
        $bread_array[] = array(
            'title'=>$parent->title,
            'id'=>$parent->id,
        ) ;
    }
    $bread_array[] = array( // так же добавляем саму категорию в конец массива
        'title'=>$breadcrumb->title,
        'id'=>$breadcrumb->id,
    ) ;
}
?>

<ul class="breadcrumb">
    <?php
    foreach($bread_array as $items) {
        $link = array('/admin/category') ;
        if($items['id'] != '') {
            $link += array('id'=>$items['id']) ;
        }

        if(isset($_GET['id']) and $_GET['id']==$items['id']) {
            echo "<li class='active'>" ;
                echo $items['title'] ;
            echo "</li>" ;
        } else {
            echo "<li>" ;
                echo  CHtml::link($items['title'],$link)."<span class='divider'>/</span>";
            echo "</li>" ;
        }
    }
    ?>
</ul>


<?php
$link = array('/admin/category/create') ;
if(isset($_GET['id'])) {
    $link = $link + array('id'=>$_GET['id']) ;
}
echo "<p>".CHtml::link('Добавить категорию', $link, array('class'=>'btn btn-info'))."</p>" ;

if(count($model)) {
    echo "<div class='well' id='catalog'>" ;
        $this->renderPartial('_view', array('model'=>$model)) ;
    echo "</div>" ;
}
?>


<?php
if(isset($_GET['id'])) {
    $this->renderPartial('_product_list', array('dataProvider'=>$dataProvider)) ;
}
?>