<div class="row-fluid">
    <div class="span9">
        <div class="well">
            <legend></legeng><h2><?php echo $model->title ; ?></h2></legend>
            <p><strong>Цена: </strong><?php echo $model->price ;?> руб.</p>
            <p><strong>Кол-во на складе: </strong><?php echo $model->quantity ;?> шт.</p>
            <p><strong>Описание: </strong><?php echo $model->desc ;?></p>

                <div class="row-fluid">
                <div class="span3">
                    <div class="input-prepend input-append">
                        <span class="add-on">Кол-во:</span>
                        <?php echo CHtml::tag('input', array('type'=>'number', 'value'=>'1', 'name'=>'productCount', 'class'=>'input-mini', 'id'=>'productCount')) ;?>
                        <span class="add-on">шт.</span>
                    </div>
                </div>
                <div class="span4">
                    <div class="btn-group">
                        <?php echo CHtml::link("В корзину", array('#'), array('id'=>$model->id, 'class'=>'btn btn-info', 'rel'=>'popover')) ;?>
                        <?php echo CHtml::link("Купить за 1 клик", '#', array('id'=>$model->id, 'class'=>'btn btn-warning', 'rel'=>'buy1click')) ;?>
                    </div>
                </div>

                </div>

        </div>


        <?php if(count($attr)):?>
            <p><strong>Характеристки:</strong></p>
            <div class="attribute">
                <table>
                    <?php
                    foreach($attr as $item) {
                        echo "<tr>";
                        echo "<td><strong>".$item['name'].":<strong></td><td>".$item['value']."</td>" ;
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <div class="span3">
        <?php
        // Картинки товара
        if(count($imgList)) {
            echo "<ul class='thumbnails'>";
            foreach($imgList as $img) {
                echo "<li class='span12'>";
                echo "<div class='thumbnail'>";
                echo CHtml::image(ProductImg::PRODUCT_IMG_DIR.$model->id."/".$img['img_file'], '', array());
                echo "</div>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<ul class='thumbnails'>";
            echo "<li class='span12'>";
            echo "<div class='thumbnail'>";
            echo CHtml::image('/img/noimage.png', '', array());
            echo "</div>";
            echo "</li>";
            echo "</ul>";
        }
        ?>
    </div>
</div>
