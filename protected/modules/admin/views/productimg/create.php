<?php
/* @var $this ProductimgController */
/* @var $model ProductImg */
?>

<legend>Изображения продукта</legend>

<div class="row-fluid">
    <div class="span1">
        <br />
        <?php
        $link = array('/admin/product/update') ;
        $link = $link + array('id'=>Cookie::get('create_product_id')) ;
        echo CHtml::link("<i class='icon2-arrow-left-3' style='font-size: 57px;'></i>", $link);
        ?>

    </div>
    <div class="span10">
        <div class="well">
            <?php
                echo $this->renderPartial('_form', array('model'=>$model));
            ?>

            <pre>
                <?php
                    $img = ProductImg::getImageList($model->product_id) ;
                    print_r($img) ;
                ?>
            </pre>

            <?php
                echo CHtml::link('Продолжить', array('/admin/attributevalue/create'), array('class'=>'btn')) ;
            ?>
        </div>    <!-- well -->
    </div>        <!-- span8 -->
</div>