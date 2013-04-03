<?php /* @var $this Controller */ ?>
<div class="row-fluid">
    <div class="span9">
        <div class="well">
            <h2><?php echo CHtml::encode($model->title) ;?></h2><hr>
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

                    <div class="modal fade" id="callBack" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">Обратный звонок</h4>
                        </div>
                        <div class="modal-body">
                            <div class="span4">
                                <?php echo CHtml::image("/img/callBack.jpg", "Обратный звонок", array('style'=>'width: 350px;')) ;?>
                            </div>
                            <div class="span8">
                                <p>Пожалуйста, укажите Ваш контактный номер телефона, и мы свяжемся с Вами в ближайшее время:</p>
                                <?php echo CHtml::textField('phoneNumber', '', array('class'=>'span6','id'=>'phoneNumber', 'placeholder'=>'Ваш номер телефона')) ;?>
                                <small><p class="muted">Например: +7 924 000 0000</p></small>
                                <p>Также можете указать, в какое время удобнее позвонить Вам (желательно указывать московское время):</p>
                                <?php echo CHtml::textField('callTIme', '', array('class'=>'span6','id'=>'callTime', 'placeholder'=>'Как можно раньше :)')) ;?>
                                <small><p class="muted">Например: с 9 до 20 по МСК</p></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Отмена</button>
                            <button class="btn btn-info" id="buy1click">Жду звонка :)</button>
                        </div>
                    </div>

                    <div class="btn-group">
                        <?php echo CHtml::link("В корзину", '#', array('id'=>$model->id, 'class'=>'btn btn-info', 'rel'=>'popover')) ;?>
                        <?php echo CHtml::link("Купить за 1 клик", '#callBack', array('id'=>$model->id, 'class'=>'btn btn-warning', "data-toggle"=>"modal")) ;?>
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
                echo CHtml::link(CHtml::image(ProductImg::PRODUCT_IMG_DIR.$model->id."/".$img['img_file'], $model->title, array()), ProductImg::PRODUCT_IMG_DIR.$model->id."/".$img['img_file'], array('rel'=>'lightbox-items', 'title'=>$model->title)) ;
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