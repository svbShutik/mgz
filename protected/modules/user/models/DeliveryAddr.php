<?php

/**
 * This is the model class for table "delivery_addr".
 *
 * The followings are the available columns in table 'delivery_addr':
 * @property integer $id
 * @property integer $user_id
 * @property integer $indx
 * @property string $region
 * @property string $city
 * @property string $adds
 * @property string $phone
 * @property integer $icq
 * @property string $skype
 */
class DeliveryAddr extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DeliveryAddr the static model class
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
		return 'delivery_addr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, indx, region, city, adds', 'required'),
			array('user_id, indx, icq', 'numerical', 'integerOnly'=>true),
            array('phone, icq, skype', 'safe'),
			array('region, city', 'length', 'max'=>75),
			array('adds', 'length', 'max'=>255),

			array('phone', 'length', 'max'=>12),
            array('phone', 'match', 'pattern' => '/^((\+?7)(-?\d{3})-?)?(\d{3})(-?\d{4})$/', 'message' => 'Некорректный формат поля {attribute}'),

			array('skype', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, indx, region, city, adds, phone, icq, skype', 'safe', 'on'=>'search'),
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
			'user_id' => 'ID пользователя',
			'indx' => 'Почтовый индекс',
			'region' => 'Область, регион, край',
			'city' => 'Город, село',
			'adds' => 'Адрес',
			'phone' => 'Телефон',
			'icq' => 'Icq',
			'skype' => 'Skype',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('indx',$this->indx);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('adds',$this->adds,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('icq',$this->icq);
		$criteria->compare('skype',$this->skype,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}