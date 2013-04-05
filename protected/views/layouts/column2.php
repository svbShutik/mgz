<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span3">
                <?php
                if(count($this->catalog_menu)) {
                    echo "<div class='catalog'>";
                        $this->widget('application.components.catalog_menu', array(
                            'data'=>$this->catalog_menu,
                        ));
                    echo "</div>";

                    if(Yii::app()->user->isAdmin()) {
                        echo CHtml::link("Admin", array("/admin/index"), array('class'=>'btn btn-danger btn-block')) ;
                    }
                }
                ?>
    </div>
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>