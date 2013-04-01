<?php
/* @var $this DefaultController */
$this->catalog_menu = $data ;
?>

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