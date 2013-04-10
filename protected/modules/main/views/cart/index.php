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
    echo CHtml::link("<i class='icon2-phone'></i>Купить за 1 клик", '#', array("class"=>"btn btn-warning", "rel"=>"buy1click")) ;
}
?>
<?php if(Yii::app()->shoppingCart->getItemsCount()):?>
<div class="pull-right">
    <?php echo CHtml::link("<i class='icon2-cart-2'></i>Оформить заказ", array('/main/cart/createorder'), array('class'=>'btn btn-success')) ; ?>
</div>
<div class="top-padding"></div>
<?php endif ; ?>