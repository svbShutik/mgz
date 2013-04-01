<?php
/* @var $this DefaultController */
/* @var $model Category */
?>
<table class="table">
<?php
    foreach($model as $item) {
        if($item->active == 1) {
            $active = "<span class='badge badge-success'>Вкл</span>" ;
        } else {
            $active = "<span class='badge badge-important'>Выкл</span>" ;
        }
        echo "<tr>" ;

            echo "<td style='width:15px;'>".CHtml::ajaxLink($active,array('/admin/category/activecatalog', 'id'=>$item->id),
                array( //Ajax
                    'type'=>'get',
                    'update'=>'#catalog',
                    //Индикатор Ajax загрузки
                    'beforeSend'=>"js:function(){
                        $('#cat".$item->id."').addClass('loading') ;
                    }",
                    'complete'=>"js:function(){
                        $('#cat".$item->id."').removeClass('loading') ;
                    }",
                ), array('id'=>'cat'.$item->id));
            echo "</td>" ;

            echo "<td>" ;
            echo CHtml::link($item->title, array('/admin/category/index', 'id'=>$item->id)).
                " <div class='pull-right'>[ ".CHtml::link("<i class='icon2-wrench'></i>", array("/admin/category/edit",'id'=>$item->id))
                ." | ".CHtml::link("<i class='icon2-remove'></i>", array("/admin/category/delete",'id'=>$item->id), array('onclick'=>"return confirm('Удалить категорию: ".$item->title." ?\\nТак же удалятся ВСЕ подкатегории!');"))." ]</div>" ;
            echo "<br />".$item->memo ;
            echo "</td>" ;
        echo "</tr>" ;
    }
?>
</table>