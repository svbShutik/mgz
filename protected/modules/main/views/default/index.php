<?php
/* @var $this DefaultController */
?>
<div class="span3">
    <?php
    //if(count($catalog_menu)) {

        $this->widget('application.components.catalog_menu', array(
            'data'=>$catalog_menu,
        ));

        if(Yii::app()->user->isAdmin()) {
            echo CHtml::link("Admin", array("/admin/index"), array('class'=>'btn btn-danger btn-block')) ;
        }
    //}
    ?>
</div>

<div class="span9">
<ul class="breadcrumb">
    <?php
    if(count($bread_array)){
        echo "<li>" ;
        echo  CHtml::link('Главный каталог',array('/main/default'))."<span class='divider'>/</span>";
        echo "</li>" ;

        foreach($bread_array as $item) {
            $link = array('/main/default') ;
            if($item['id'] != '') {
                $link += array('cid'=>$item['id']) ;
            }

            if(isset($_GET['cid']) and $_GET['cid']==$item['id']) {
                echo "<li class='active'>" ;
                echo $item['title'] ;
                echo "</li>" ;
            } else {
                echo "<li>" ;
                echo  CHtml::link($item['title'],$link)."<span class='divider'>/</span>";
                echo "</li>" ;
            }
        }
    } else {
        echo "<li class='active'>" ;
        echo  CHtml::link('Главный каталог',array('/main/default'))."<span class='divider'>/</span>";
        echo "</li>" ;
    }
    ?>
</ul>


<div class="row-fluid">
    <div class="product-list">
        <?php
        $this->renderPartial('_product-list', array('items'=>$items), false, false) ;
        ?>
    </div>
</div>

<?php
if(isset($pages)) {
    echo "<div class='pagination pagination-centered'>";
        $this->widget('CLinkPager', array('pages' => $pages, 'header'=>'', 'cssFile'=>false));
    echo "</div>";
}
?>

</div>