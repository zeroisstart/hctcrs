<?php

/**
 * This is the model class for table "bookmark".
 *
 * The followings are the available columns in table 'bookmark':
 * @property integer $ID
 * @property string $Cate
 * @property string $Title
 * @property integer $Time
 * @property string $Url
 * @property string $Read
 */
class Bookmark extends CActiveRecord {
	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className
	 *        	active record class name.
	 * @return Bookmark the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'bookmark';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'Cate, Title, Time, Url',
						'required' 
				),
				/*array (
						'Time',
						'numerical',
						'integerOnly' => true 
				),*/
				array (
						'Cate, Title, Url',
						'length',
						'max' => 255 
				),
				array (
						'Read',
						'length',
						'max' => 1 
				),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array (
						'ID, Cate, Title, Time, Url, Read',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array ();
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'ID' => 'ID',
				'Cate' => 'Cate',
				'Title' => 'Title',
				'Time' => 'Time',
				'Url' => 'Url',
				'Read' => 'Read' 
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'ID', $this->ID );
		$criteria->compare ( 'Cate', $this->Cate, true );
		$criteria->compare ( 'Title', $this->Title, true );
		$criteria->compare ( 'Time', $this->Time );
		$criteria->compare ( 'Url', $this->Url, true );
		// criteria->compare('Read',$this->Read,true);
		
		return new CActiveDataProvider ( $this, array (
				'pagination' => array (
						'pageSize' => 40 
				),
				'criteria' => $criteria 
		) );
	}
	public function getBookMarkCate() {
		$criteria = new CDbCriteria();
		$criteria -> group ='Cate';
		$criteria -> select = array('Cate');
		$data = $this -> query($criteria,true);
		return $data;
	}
}