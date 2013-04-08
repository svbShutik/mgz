<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property string $title
 * @property string $memo
 * @property integer $active
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function behaviors() {
        return array(
            'tree'=>array(
                'class'=>'ext.behaviors.model.trees.NestedSetBehavior',
                'hasManyRoots'=> true,
            ),
        ) ;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>150),
            array('memo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, root, lft, rgt, level, title, memo, active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Имя категории',
			'memo' => 'Описание',
			'active' => 'Видимость',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('root',$this->root);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('level',$this->level);
		$criteria->compare('title',$this->name,true);
		$criteria->compare('memo',$this->memo,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    //Получаем массив array(id=>name_category)
    //TODO: view - /product/_form.php
    public function category_name($id) {
        $sql = "SELECT id, title
            FROM category
            WHERE id=".$id."
        " ;
        $row = Yii::app()->db->createCommand($sql)->queryRow() ;
        if(!is_array($row)) {
            throw new CHttpException(404, 'Не определена категория!') ;
        }
        $return = array($row['id']=>$row['title']) ;
        return $return ;
    }

    public function getCategoryName($id) {
        $sql = "SELECT id, title
            FROM category
            WHERE id=".$id."
        " ;
        $row = Yii::app()->db->createCommand($sql)->queryRow() ;
        if(!is_array($row)) {
            throw new CHttpException(404, 'Не определена категория!') ;
        }
        $return = array('id'=>$row['id'],'title'=>$row['title']) ;
        return $return ;
    }

    public function loadModel($id) {
        $model = $this->findByPk($id) ;
        if($model == null) {
            throw new CHttpException(404, "Каталог не найден!") ;
        }
        return $model ;
    }

    public function getBreadcrumbs($model){
        $parents = $model->ancestors()->findAll() ;
        foreach($parents as $parent) {
            $bread_array[] = array(
                'title'=>$parent->title,
                'id'=>$parent->id,
            ) ;
        }

        $bread_array[] = array(
            'title'=>$model->title,
            'id'=>$model->id,
        );
        return $bread_array ;
    }

}