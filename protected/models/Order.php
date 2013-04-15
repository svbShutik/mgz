<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property integer $order_key
 * @property integer $user_id
 * @property integer $guest_id
 * @property integer $create_time
 * @property integer $status
 * @property integer $delivery
 * @property integer $pay
 * @property integer $done
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_key, create_time, status, delivery, pay, done', 'required'),
            array('user_id, guest_id', 'safe'),
			array('order_key, user_id, guest_id, create_time, status, delivery, pay, done', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_key, user_id, guest_id, create_time, status, delivery, pay, done', 'safe', 'on'=>'search'),
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
            'items'=>array(self::HAS_MANY, 'OrderItems', 'order_id'),
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
			'user_id' => 'Пользователь',
			'guest_id' => 'Гость',
			'create_time' => 'Дата создания',
			'status' => 'Статус',
			'delivery' => 'Доставка',
			'pay' => 'Итого к оплате',
			'done' => 'Готов',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('guest_id',$this->guest_id);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('delivery',$this->delivery);
		$criteria->compare('pay',$this->pay);
		$criteria->compare('done',$this->done);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}