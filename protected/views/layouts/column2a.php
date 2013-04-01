<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container-narrow">
    <div class="row-fluid">
        <div class="span9">
            <div id="content">
                <?php echo $content; ?>
            </div><!-- content -->
        </div>

        <div class="span3">
            <div id="sidebar">
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'<legend style="margin-bottom: 10px"><h1>Меню</h1></legend>',
                ));

                $this->widget('Usermenu',array(
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'btn btn-block'),
                )) ;
                $this->endWidget();
                ?>
            </div><!-- sidebar -->


        </div>
    </div>
</div>
<?php $this->endContent(); ?>