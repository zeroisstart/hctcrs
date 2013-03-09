<?php

/**
 * This is the model class for table "z_attachment".
 *
 * The followings are the available columns in table 'z_attachment':
 * @property integer $ID
 * @property integer $category
 * @property string $url
 * @property string $cookie
 * @property string $title
 * @property string $isdownload
 * @property string $create_time
 * @property integer $ext
 */
class ZAttachment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ZAttachment the static model class
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
		return 'z_attachment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category, ext', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>1024),
			array('title', 'length', 'max'=>255),
			array('isdownload', 'length', 'max'=>1),
			array('cookie, create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, category, url, cookie, title, isdownload, create_time, ext', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'category' => 'Category',
			'url' => 'Url',
			'cookie' => 'Cookie',
			'title' => 'Title',
			'isdownload' => 'Isdownload',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('cookie',$this->cookie,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('isdownload',$this->isdownload,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('ext',$this->ext);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}