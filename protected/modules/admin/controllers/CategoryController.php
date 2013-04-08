<?php

class CategoryController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
           /* array(
                'ESetReturnUrlFilter',

            ),*/
        );
    }

	public function actionIndex($id=0)
	{
        if($id != 0) {
            // находимся в какой то категории
            $root = $this->loadModel($id) ;
            $bread_array = Category::model()->getBreadcrumbs($root) ;
            $model = $root->children()->findAll() ; // список подкатегорий в текущей категории

            $descendants = $root->descendants()->findAll() ; // Выбираем ВСЕХ потомков категории

            $node_id[] = $id ;
            foreach($descendants as $node) {
                $node_id[] = $node->id ;
            }

            // список продуктов в текущей категории, и подкатегориях c первыми (sort=1) картинками
            $sql = "SELECT DISTINCT p.*, c.title as title_cat, c.id as id_cat, i.img_file
                    FROM (SELECT DISTINCT p.* FROM product p WHERE p.category_id IN (".implode(',',$node_id).")) p
                    LEFT JOIN (SELECT DISTINCT i.product_id, i.img_file FROM product_img i WHERE i.sort=1) i ON p.id = i.product_id
                    LEFT JOIN category c ON p.category_id = c.id" ;
            $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM product WHERE category_id IN ('.implode(",", $node_id).')')->queryScalar() ; // определяем сколько всего товаров в категории и подкатегориях
            //$sql = 'SELECT * FROM product WHERE category_id IN ('.implode(",", $node_id).')' ;
            $dataProvider = new CSqlDataProvider($sql, array(
                //'keyField' => 'id',
                'sort'=>array(
                     'attributes'=>array(
                           'id', 'product_type_id', 'category_id', 'brand_id', 'quantity', 'price',
                 ),),
                'totalItemCount'=>$count,
                'pagination'=>array(
                    'pageSize'=>25,
                ),
            )) ;

            $this->render('index', array('model'=>$model, 'dataProvider'=>$dataProvider, 'bread_array'=>$bread_array)) ;
            Yii::app()->end() ; // ??????

        } else {
            // находимся в корне
           /* $bread_array[] = array(
                'title'=> '<strong>Главный каталог</strong>',
                'id'=>'',
            ) ;*/


            $model = Category::model()->roots()->findAll() ;
            $this->render('index', array('model'=>$model));
        }
	}

    //Создание нового узла
    public function actionCreate($id=0){
        $model = new Category() ;
        if(isset($_POST['Category'])) {
            $model->attributes = $_POST['Category'] ;
            if($id != 0) {
                //Добавляем чайлад к корневому каталогу
                $root = $this->loadModel($id) ;
                $model->appendTo($root) ;
                $this->redirect(array('/admin/category/index', 'id'=>$id)) ;
            } else {
                //Создаем корневой каталог
                $model->saveNode() ;
                $this->redirect(array('/admin/category/index')) ;
            }
        }

        $this->render('create', array('model'=>$model)) ;
    }

    //Редактирование узла
    public function actionEdit($id=0) {
        $model = $this->loadModel($id) ;
        if(isset($_POST['Category'])) {
            $model->attributes = $_POST['Category'] ;
            if($model->saveNode()) {
                $link = array('/admin/category') ;
                if(!$model->isRoot()) {
                    $parent = $model->parent()->find() ;
                    $link += array('id'=>$parent->id) ;
                }
                $this->redirect($link) ;
            }
        }
        $this->render('edit', array('model'=>$model)) ;
    }

    //Удаление узла
    /*
     * TODO: Циклом удалить все товары, которые находятся в удаляемой категории, и подкатегориях
     */
    public function actionDelete($id) {
        $link = array('/admin/category') ;
        $model = $this->loadModel($id) ;
        if(!$model->isRoot()) {
            $parent = $model->parent()->find() ;
            $link += array('id'=>$parent->id) ;
        }
        $model->deleteNode() ;
        $this->redirect($link) ;

    }

    // Перемещение узла в качестве нового корня
    public function actionMoveInRoot($id) {
        $model = $this->loadModel($id) ;
        if($model->isLeaf()) { //Если категория является дочерней
            $model->moveAsRoot() ;
            $this->redirect(array('/admin/category')) ;
        } else {
            $this->redirect(array('/admin/category/edit', 'id'=>$model->id)) ;
        }
    }

    public function loadModel($id) {
        $model = Category::model()->findByPk($id) ;
        if($model != null) {
            return $model ;
        } else
            throw new CHttpException(404,'Категория не найдена') ;
    }






}