<?php

/**
 * This is the model class for table "attribute_group".
 *
 * The followings are the available columns in table 'attribute_group':
 * @property integer $id
 * @property string $name
 */
class AttributeGroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AttributeGroup the static model class
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
		return 'attribute_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
			'name' => 'Название группы',
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
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    /**
     * @return array AttributeGroup
     */
    public function getAttributeGroupList(){
        $sql = "SELECT * FROM attribute_group" ;
        $row = Yii::app()->db->createCommand($sql)->queryAll() ;
        foreach($row as $item) {
            $return[$item['id']] = $item['name'] ;
        }
        return $return ;
    }

    //массив типов продуктов array(id=>title)
    public function getProductType() {
        $model = $this::model()->findAll() ;
        $productType = array() ;
        foreach($model as $item) {
            $productType[$item->id] = $item->name ;
        }
        return $productType ;
    }

    public function getProductTypeName($id, $arr=true) {
        if($arr) {
            $sql = "SELECT id, name FROM attribute_group WHERE id=".$id ;
            $row = Yii::app()->db->createCommand($sql)->queryRow() ;
            $return = array($row['id']=>$row['name']) ;
        } else {
            $sql = "SELECT name FROM attribute_group WHERE id=".$id ;
            $row = Yii::app()->db->createCommand($sql)->queryRow() ;
            $return = $row['name'] ;
        }
        return $return ;
    }


}