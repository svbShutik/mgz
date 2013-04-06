<?php if(!empty($search->string)): ?>
<div class="alert alert-info">
    <p>Результаты поиска "<strong style="color: #679a06;"><?php echo CHtml::encode($search->string); ?>"</strong></p>
    <p>Всего найдено: <?php echo $pages->itemCount; ?></p>
</div>
<?php endif; ?>

<?php if($products): ?>
    <div class="row-fluid">
        <div class="product-list">
                <?php
                $this->renderPartial('_product-list', array('items'=>$products), false, false) ;
                ?>
        </div>
    </div>
<?php endif; ?>

<?php
if(isset($pages)) {
    echo "<div class='pagination pagination-centered'>";
        $this->widget('CLinkPager', array('pages' => $pages, 'header'=>'', 'cssFile'=>false));
    echo "</div>";
}
?>