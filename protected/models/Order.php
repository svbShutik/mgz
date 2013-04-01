<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property integer $user_id
 * @property string $order_key
 * @property integer $create_time
 * @property integer $delivery
 * @property integer $pay
 * @property integer $total_price
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
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, create_time, delivery, pay, total_price', 'required'),
            array('order_key', 'safe'),
			array('user_id, create_time, delivery, pay, total_price', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, order_key, create_time, delivery, pay, total_price', 'safe', 'on'=>'search'),
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
            'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
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
			'user_id' => 'Пользователь',
            'order_key' => 'Номер заказа',
			'create_time' => 'Дата создания',
			'delivery' => 'Вид доставки',
			'pay' => 'Оплата',
			'total_price' => 'Итоговая цена',
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
        $criteria->compare('order_key',$this->order_key, true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('delivery',$this->delivery);
		$criteria->compare('pay',$this->pay);
		$criteria->compare('total_price',$this->total_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function loadModel($id) {
        $model = $this->findByPk($id) ;
        if($model == null) {
            throw new CHttpException(404) ;
        }
        return $model ;
    }

    public function getOrder($order_key) {
        $sql = "SELECT * FROM orders WHERE order_key=".$order_key." LIMIT 1" ;
        $order = Yii::app()->db->createCommand($sql)->queryRow() ;
        if($order == null) {
            throw new CHttpException(404, "Wrong Order ID") ;
        }
        return $order['id'] ;
    }
}