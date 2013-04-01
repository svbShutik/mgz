<?php

/**
 * This is the model class for table "quest_order".
 *
 * The followings are the available columns in table 'quest_order':
 * @property integer $id
 * @property integer $order_key
 * @property integer $create_time
 * @property string $fio
 * @property string $phone
 * @property string $email
 * @property integer $delivery
 * @property string $adres
 * @property string $memo
 * @property integer $pay
 * @property integer $total_price
 */
class GuestOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QuestOrder the static model class
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
		return 'guest_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fio, phone, email, delivery, adres, pay', 'required'),
			array('total_price, create_time, order_key, create_time, delivery, pay', 'numerical', 'integerOnly'=>true),
            array('order_key, memo, total_price', 'safe'),
			array('phone', 'length', 'max'=>15),
			array('email', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, total_price, order_key, create_time, fio, phone, email, delivery, adres, memo, pay', 'safe', 'on'=>'search'),
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
            //'items'=>array(self::HAS_MANY, 'OrderItems', 'order_id', array('order_key'=>'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_key' => 'Номер заказа',
			'create_time' => 'Дата создания',
			'fio' => 'Ф.И.О.',
			'phone' => 'Телефон',
			'email' => 'Email',
			'delivery' => 'Способ доставки',
			'adres' => 'Адрес',
			'memo' => 'Дополнительная информация',
			'pay' => 'Способ оплаты',
            'total_price'=>'Итоговая сумма',
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
		$criteria->compare('order_key',$this->order_key);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('delivery',$this->delivery);
		$criteria->compare('adres',$this->adres,true);
		$criteria->compare('memo',$this->memo,true);
		$criteria->compare('pay',$this->pay);
        $criteria->compare('total_price',$this->total_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}