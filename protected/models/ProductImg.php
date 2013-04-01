<?php

/**
 * This is the model class for table "product_img".
 *
 * The followings are the available columns in table 'product_img':
 * @property integer $id
 * @property integer $product_id
 * @property string $img_file
 * @property string $image_file
 * @property integer $sort
 */
class ProductImg extends CActiveRecord
{
    const PRODUCT_IMG_DIR = "/uploads/product/" ;

    public $image_file ;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductImg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_img';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, image_file, sort', 'required'),
			array('product_id, sort', 'numerical', 'integerOnly'=>true),

            array('image_file', 'file', 'types'=>'jpg'),
            array('img_file', 'safe'),

            //проверка на совпадение номера очереди, должна быть уникальна
            array('sort', 'unique', 'criteria'=>array(
                'condition'=>'product_id='.$this->product_id,)),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, img_file, sort', 'safe', 'on'=>'search'),
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
			'product_id' => 'Продукт',
			'img_file' => 'Файл',
			'sort' => 'Очередь',
            'image_file' =>'Изображение',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('img_file',$this->file,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    // переименовываем загружаемый файл
    public function beforeSave() {
        $dirnam = dirname(Yii::app()->request->scriptFile).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'product'.DIRECTORY_SEPARATOR.$this->product_id ;
        if(!is_dir($dirnam)) {
            mkdir($dirnam) ;
        }
        $strSource = uniqid().".jpg" ;
        if($this->image_file instanceof CUploadedFile) {
            $this->image_file->saveAs($dirnam.DIRECTORY_SEPARATOR.$strSource) ;
            $this->img_file = $strSource ;
        }
        return parent::beforeSave();
    }

    //Список картинок продукта
    public function getImageList($id) {
        $sql = "SELECT * FROM product_img WHERE product_id=".$id." ORDER BY sort" ;
        $img = Yii::app()->db->createCommand($sql)->queryAll() ;
        return $img ;
    }

    //Первая картинка продукта: sort = 1
    //в случае отсутствия изображение, возвращает путь до пустышки
    public function getFirstImage($id) {
        $sql = "SELECT * FROM product_img WHERE product_id=".$id." AND sort=1" ;
        $img = Yii::app()->db->createCommand($sql)->queryRow() ;
        if($img != null) {
            return ProductImg::PRODUCT_IMG_DIR.$id."/".$img["img_file"] ;
        } else {
            return "/img/noimage.png" ;
        }

    }
}