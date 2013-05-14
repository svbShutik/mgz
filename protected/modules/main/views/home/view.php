<legend>Просмотр заказа <strong>№<?php echo $order->order_key?> от <?php echo date("d.m.Y", $order->create_time) ;?></strong></legend>

<?php
$deliver = Delivery::model()->getDelivery($order->delivery) ;
echo "<div class='alert alert-info'>";
    echo "Выбранный способ доставки: <strong>".$deliver->title."</strong>" ;
echo "</div>";

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
            echo "</tr>" ;
        echo "</thead>";
        echo "<tbody>";
        foreach($order->items as $item) {
        echo "<tr>" ;
            echo "<td>" ;
                echo "<div class='imgCart'>" ;
                    echo CHtml::image(ProductImg::model()->getFirstImage($item->product_id),'') ;
                    echo "</div>" ;
                echo "</td>" ;

            echo "<td>";
                echo CHtml::link($item->product->title, $this->createUrl("/main/view", array("numiid"=>$item->product_id)), array()) ;
                echo "</td>";

            echo "<td>";
                echo $item->product->price." руб." ;
                echo "</td>";

            echo "<td>";
                echo $item->count." шт." ;
                echo "</td>";

            echo "<td>";
                echo $item->count * $item->product->price." руб." ;
                echo "</td>";

            echo "</tr>" ;
        } // END FOREACH

        echo "</tbody>";
        echo "</table>";
echo "<div class='alert alert-info'>Общая стоимость, с учетом доставки: <strong>".Order::model()->TotalPrice($order->pay, $order->delivery)." руб.</strong></div>" ;
echo "</div>";
    ?>