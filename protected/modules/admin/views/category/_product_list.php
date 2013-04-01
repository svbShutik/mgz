<?php
echo "<legend>".CHtml::link('Добавить продукт в эту категорию',array('/admin/product/create', 'id'=>$_GET['id']), array('class'=>'btn btn-info') )." <div class='pull-right'>Список товаров в категории, и подкатегориях</div></legend>" ;
?>
<div class="well">
    <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$dataProvider,
            'columns'=>array(
                array(
                    'name'=>'id',
                    'header'=>'ID',
                    'sortable' => true,
                ),
                array(
                    'name'=>'img_file',
                    'header'=>'Картинка',
                    'type'=>'html',
                    'value'=>function($data){
                        if(empty($data['img_file'])) {
                            return CHtml::image("/img/noimage.png", '', array('width'=>'75')) ;
                        }
                        $img = ProductImg::PRODUCT_IMG_DIR.$data['id']."/".$data['img_file'] ;
                        return CHtml::image($img,'', array('width'=>'75')) ;
                    },
                ),
                array(
                    'name'=>'product_type_id',
                    'header'=>'Тип продукта',
                    'sortable' => true,
                    'value'=>'AttributeGroup::getProductTypeName($data[product_type_id], false)',
                ),
                array(
                    'name'=>'title',
                    'header'=>'Название продукта',
                ),
               /* array(
                    'name'=>'category_id',
                    'header'=>'Категория',
                    'sortable' => true,
                    'type'=>'html',
                    'value'=>function ($data) {
                                $category = Category::getCategoryName($data['category_id']);
                                return CHtml::link($category['title'], array("/admin/category/index", "id"=>$category['id'])) ;
                             },
                ),*/
                array(
                    'name'=>'category_id',
                    'header'=>'Категория',
                    'sortable' => true,
                    'type'=>'html',
                    'value'=> function ($data) {
                                return CHtml::link($data['title_cat'], array("/admin/category/index", "id"=>$data['id_cat']));
                    },
                ),
                array(
                    'name'=>'brand_id',
                    'header'=>'Бренд',
                    'sortable' => true,
                    //'value'=>
                ),
                array(
                    'name'=>'quantity',
                    'header'=>'Кол-во',
                    'sortable' => true,
                ),
                array(
                    'name'=>'price',
                    'header'=>'Цена',
                    'sortable' => true,
                ),
                array(
                    'name'=>'active',
                    'header'=>'Видимость',
                    'value'=>'Helper::getActiveList($data[active])',
                ),
                array(            // display a column with "view", "update" and "delete" buttons
                    'class'=>'CButtonColumn',
                    'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/product/delete", array("id"=>$data["id"]))',
                    'viewButtonUrl'=>'Yii::app()->createUrl("/admin/product/view", array("id"=>$data["id"]))',
                    'updateButtonUrl'=>'Yii::app()->createUrl("/admin/product/update", array("id"=>$data["id"]))',
                    //'template'=>'{view}{edit}{delete}',
                ),
            ),
        ));
    ?>
</div>