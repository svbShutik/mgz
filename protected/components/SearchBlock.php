<?php

class SearchBlock extends CWidget
{
    public function run()
    {
        $form = new SiteSearchForm();
        $this->render('siteSearch', array('form'=>$form));
    }
}