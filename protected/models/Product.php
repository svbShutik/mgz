<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 * @property integer $quantity
 * @property double $price
 * @property integer $brand_id
 * @property integer $active
 * @property string $desc
 * @property integer $product_type_id
 */
class Product extends CActiveRecord implements IECartPosition
{

    public $cat_last = 1 ;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    function getId() {
        return 'Product'.$this->id ;
    }

    function getPrice() {
        return $this->price ;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, category_id, product_type_id, price, quantity', 'required'),
			array('category_id, quantity, brand_id, active, product_type_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title', 'length', 'max'=>255),
			array('desc, cat_last', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, category_id, quantity, price, brand_id, active, desc, product_type_id', 'safe', 'on'=>'search'),
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
            'image'=>array(self::HAS_MANY, 'ProductImg', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название продукта',
			'category_id' => 'Категория продукта',
			'quantity' => 'Количество на складе',
			'price' => 'Цена',
			'brand_id' => 'Бренд',
			'active' => 'Активность',
			'desc' => 'Описание товара',
			'product_type_id' => 'Тип продукта',

            'cat_last'=>'CAT_LAST',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('price',$this->price);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('active',$this->active);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('product_type_id',$this->product_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Возвращает N кол-во последних, добавленных в базу продуктов
     * по дефолту возвращает последние 6 продуктов
     * @return array
     */
    public function GetNewProduct($count = 6) {
        $sql = "SELECT * FROM product ORDER BY id DESC LIMIT ".$count ;
        $products = Yii::app()->db->createCommand($sql)->queryAll() ;
        return $products ;
    }

    //Перед удалением продукта из БД
    public function beforeDelete() {
        //Удаляем картинки из БД
        $sql = "DELETE FROM product_img WHERE product_id=".$this->id ;
        Yii::app()->db->createCommand($sql)->execute() ;
        //Удаляем файлы картинок с дирректорией
        @Helper::removeDirectory(dirname(Yii::app()->request->scriptFile).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'product'.DIRECTORY_SEPARATOR.$this->id) ;

        return parent::beforeDelete() ;
    }

    public function loadmodel($id) {
        $model = Product::model()->findByPk($id) ;
        if($model == null) {
            throw new CHttpException(404) ;
        }
        return $model ;
    }

    public function getOtherProduct(Product $model) {
        $sql = "SELECT * FROM product WHERE category_id=".$model->category_id." AND active=1 ORDER BY DESC LIMIT RANDOM(6)" ;
    //    $other = Yii::app()
    }

}