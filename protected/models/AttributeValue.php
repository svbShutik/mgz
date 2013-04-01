<?php

/**
 * This is the model class for table "attribute_value".
 *
 * The followings are the available columns in table 'attribute_value':
 * @property integer $id
 * @property integer $product_id
 * @property integer $attribute_id
 * @property string $value
 */
class AttributeValue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AttributeValue the static model class
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
		return 'attribute_value';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, attribute_id', 'required'),
			array('product_id, attribute_id', 'numerical', 'integerOnly'=>true),
			array('value', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, attribute_id, value', 'safe', 'on'=>'search'),
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
			'product_id' => 'ID продукта',
			'attribute_id' => 'Атрибут',
			'value' => 'Значение',
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
		$criteria->compare('attribute_id',$this->attribute_id);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getAttributeValueList($id) {
        $sql = "SELECT av.id, av.value, at.name FROM attribute_value av JOIN attribute at ON av.product_id=".$id." AND av.attribute_id=at.id ORDER BY at.name" ;
        $list = Yii::app()->db->createCommand($sql)->queryAll() ;
        return $list ;

    }
}