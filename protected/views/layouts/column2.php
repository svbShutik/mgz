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