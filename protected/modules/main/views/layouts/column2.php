<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div class="row-fluid">
    <div class="span3">
        <div class="catalog">
            <p>КАТАЛОГ</p>


            <div class="catalog-list">
                <?php
                $this->widget('application.components.catalog_menu', array(
                    'data'=>$this->catalog_menu,
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="span7">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>