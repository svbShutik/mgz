<?php
/* @var $this ProductController */
/* @var $model Product */
?>
<legend>Просмотр продукта</legend>

<div class="row-fluid">
    <div class="span1">
        <br />
        <?php
        $link = array('/admin/category/index') ;
        $link = $link + array('id'=>$model->category_id) ;
        echo CHtml::link("<i class='icon2-arrow-left-3' style='font-size: 57px;'></i>", $link);
        ?>

    </div>
    <div class="span11">
        <div class="well">
            <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'id',
                'title',
                'category_id',
                'quantity',
                'price',
                'brand_id',
                'active',
                'desc',
                'product_type_id',
            ),
        )); ?>

            <?php
            if(count($image)): ?>
                <div class="well">
                    <ul class="img_container">
                        <?php
                        foreach($image as $item) {
                            echo "<li>" ;
                            echo CHtml::image(ProductImg::PRODUCT_IMG_DIR.$model->id.DIRECTORY_SEPARATOR.$item['img_file'], '', array('width'=>'115', 'class'=>'img-polaroid')) ;
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <?php endif ; ?>
        </div>    <!-- well -->
    </div>        <!-- span8 -->
</div>

