<?php

/**
 * This is the model class for table "z_link".
 *
 * The followings are the available columns in table 'z_link':
 * @property integer $ID
 * @property integer $category
 * @property string $href
 * @property string $title
 * @property string $create_time
 * @property integer $ext
 *
 * The followings are the available model relations:
 * @property ZCategory $category0
 */
class ZLink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ZLink the static model class
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
		return 'z_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID', 'required'),
			array('ID, category, ext', 'numerical', 'integerOnly'=>true),
			array('href', 'length', 'max'=>1024),
			array('title', 'length', 'max'=>255),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, category, href, title, create_time, ext', 'safe', 'on'=>'search'),
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
			'category0' => array(self::BELONGS_TO, 'ZCategory', 'category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'category' => 'Category',
			'href' => 'Href',
			'title' => 'Title',
			'create_time' => 'Create Time',
			'ext' => 'Ext',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('category',$this->category);
		$criteria->compare('href',$this->href,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('ext',$this->ext);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}