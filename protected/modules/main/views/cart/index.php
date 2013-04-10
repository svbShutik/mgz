<?php
if(Yii::app()->user->hasFlash('emptyCart')) {
    echo "<div class='alert alert-info'>" ;
        echo Yii::app()->user->getFlash('emptyCart') ;
    echo "</div>" ;
}

if(isset($data)) {
    echo "<div class='well well-small'>" ;
    echo "<table class='table table-striped'>";
        echo "<thead>";
            echo "<tr>" ;
                echo "<th>" ;
                echo "</th>" ;

                echo "<th>" ;
                    echo "Название товара" ;
                echo "</th>" ;

                echo "<th>" ;
                    echo "Цена";
                echo "</th>" ;

                echo "<th>" ;
                    echo "Кол-во";
                echo "</th>" ;

                echo "<th>" ;
                    echo "Итого";
                echo "</th>" ;

                echo "<th>" ;
                echo "</th>" ;
            echo "</tr>" ;
        echo "</thead>";
        echo "<tbody>";
        foreach($data as $position) {
            echo "<tr>" ;
            echo "<td>" ;
                echo "<div class='imgCart'>" ;
                    echo CHtml::image(ProductImg::model()->getFirstImage($position->id),'') ;
                echo "</div>" ;
            echo "</td>" ;

            echo "<td>";
                echo CHtml::link($position->title, $this->createUrl("/main/view", array("numiid"=>$position->id)), array()) ;
            echo "</td>";

            echo "<td>";
                echo $position->getPrice()." руб." ;
            echo "</td>";

            echo "<td>";
                echo $position->getQuantity()." шт." ;
            echo "</td>";

            echo "<td>";
                echo $position->getSumPrice()." руб." ;
            echo "</td>";

            echo "<td>";
            echo "<div class='delete'>";
                echo CHtml::link("<i class='icon2-remove'></i>", array("/main/cart/delete", "numiid"=>$position->id), array('tooltip'=>'popover', 'data-original-title'=>'Удалить товар', 'data-placement'=>'bottom'));
            echo "</div>" ;
            echo "</td>";

            echo "</tr>" ;
        } // END FOREACH

        echo "</tbody>";
    echo "</table>";
        echo "<div class='alert alert-info'>Общая стоимость, без учета доставки: <strong>".Yii::app()->shoppingCart->getCost()." руб.</strong></div>" ;
    echo "</div>" ;
}
?>
<?php echo CHtml::link("<i class='icon2-phone'></i>Купить за 1 клик", '#callBack', array('class'=>'btn btn-warning', "data-toggle"=>"modal")) ;?>


<div class="modal fade" id="callBack" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">Обратный звонок</h4>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
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
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Отмена</button>
        <button class="btn btn-info" id="buy1click">Жду звонка :)</button>
    </div>
</div>

<?php if(Yii::app()->shoppingCart->getItemsCount()):?>
<div class="pull-right">
    <?php echo CHtml::link("<i class='icon2-cart-2'></i>Оформить заказ", array('/main/cart/createorder'), array('class'=>'btn btn-success')) ; ?>
</div>
<div class="top-padding"></div>
<?php endif ; ?>