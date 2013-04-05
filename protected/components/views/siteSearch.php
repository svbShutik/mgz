<?php $url = $this->getController()->createUrl('/main/search/search'); ?>
<?php echo CHtml::beginForm($url,'POST',array('class'=>'navbar-search form-search pull-right')); ?>
    <div class="input-append">
        <?php echo CHtml::activeTextField($form,'string', array('class'=>'search-query', 'placeholder'=>'Хочу что нибудь найти :)')) ?>
        <?php echo CHtml::SubmitButton('Поиск', array('class'=>'btn btn-warning')); ?>
    </div>
<?php echo CHtml::endForm(); ?>