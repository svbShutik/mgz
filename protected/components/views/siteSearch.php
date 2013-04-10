<?php $url = $this->getController()->createUrl('/main/search/search'); ?>
<?php echo CHtml::beginForm($url,'POST',array('class'=>'navbar-search form-search pull-right', 'id'=>'mainSearchForm')); ?>
    <div class="input-append">
        <?php echo CHtml::activeTextField($form,'string', array('class'=>'search-query', 'placeholder'=>'Хочу что нибудь найти :)', 'id'=>'searchInput')) ?>
        <?php echo CHtml::SubmitButton('Поиск', array('class'=>'btn btn-warning', 'id'=>'searchButton')); ?>
    </div>
<?php echo CHtml::endForm(); ?>