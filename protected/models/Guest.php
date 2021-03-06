<?php

/**
 * This is the model class for table "guest".
 *
 * The followings are the available columns in table 'guest':
 * @property integer $id
 * @property string $fio
 * @property string $phone
 * @property string $adres
 */
class Guest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guest the static model class
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
		return 'guest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fio, phone, adres', 'required'),
			array('fio', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fio, phone, adres', 'safe', 'on'=>'search'),
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
            'order'=>array(self::HAS_ONE, 'Order', 'guest_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fio' => 'ФИО',
			'phone' => 'Номер телефона',
			'adres' => 'Адрес доставки',
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
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('adres',$this->adres,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}