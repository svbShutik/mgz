<?php

class SearchController extends Controller
{
    public $layout = '//layouts/column2' ;

    public function actionSearch()
    {
        $search = new SiteSearchForm;

        if(isset($_POST['SiteSearchForm'])) {
            $search->attributes = $_POST['SiteSearchForm'];
            $_GET['searchString'] = $search->string;
        } else {
            $search->string = $_GET['searchString'];
        }

        $criteria = new CDbCriteria(array(
            'condition' => 'active=1 AND title LIKE :keyword',
            'order' => 'id DESC',
            'params' => array(
                ':keyword' => '%'.$search->string.'%',
            ),
        ));

        $productCount = Product::model()->count($criteria);
        $pages = new CPagination($productCount);
        $pages->pageSize = 25;
        $pages->applyLimit($criteria);

        $products = Product::model()->findAll($criteria);

        $this->render('found',array(
            'products' => $products,
            'pages' => $pages,
            'search' => $search,
        ));
    }
}