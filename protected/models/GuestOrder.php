<?php

/**
 * This is the model class for table "guest_order".
 *
 * The followings are the available columns in table 'guest_order':
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
 * @property integer $user_id
 */
class GuestOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GuestOrder the static model class
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
			array('order_key, create_time, fio, phone, email, delivery, adres, memo, pay, total_price, user_id', 'required'),
			array('order_key, create_time, delivery, pay, total_price, user_id', 'numerical', 'integerOnly'=>true),
			array('phone', 'length', 'max'=>15),
			array('email', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_key, create_time, fio, phone, email, delivery, adres, memo, pay, total_price, user_id', 'safe', 'on'=>'search'),
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
			'order_key' => 'Order Key',
			'create_time' => 'Create Time',
			'fio' => 'Fio',
			'phone' => 'Phone',
			'email' => 'Email',
			'delivery' => 'Delivery',
			'adres' => 'Adres',
			'memo' => 'Memo',
			'pay' => 'Pay',
			'total_price' => 'Total Price',
			'user_id' => 'User',
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
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}