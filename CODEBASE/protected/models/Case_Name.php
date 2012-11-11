<?php

/**
 * This is the model class for table "req_name".
 *
 * The followings are the available columns in table 'req_name':
 * @property integer $ID
 * @property string $Name
 * @property string $Effect
 * @property string $Description
 * @property string $Allusion
 * @property string $Use
 * @property integer $Dateline
 */
class Case_Name extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     *
     * @param string $className
     *            active record class name.
     * @return Req_Name the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model ( $className );
    }

    /**
     *
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Case_Name';
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
                        'Name, Dateline',
                        'required'
                ),
                array (
                        'Name',
                        '_unique'
                ),
                array (
                        'Dateline',
                        'numerical',
                        'integerOnly' => true
                ),
                array (
                        'Name',
                        'length',
                        'max' => 50
                ),
                array (
                        'Effect',
                        'length',
                        'max' => 255
                ),
                array (
                        'Use',
                        'length',
                        'max' => 1
                ),
                array (
                        'Description, Allusion',
                        'safe'
                ),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array (
                        'ID, Name, Effect, Description, Allusion, Use, Dateline',
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
     * 判断是否是唯一名称
     *
     * @param string $attribute
     * @param string $param
     * @return boolean
     */
    public function _unique($attribute) {
        $Name = $this->{$attribute};
        if ($this->exists ( 'Name=:name', array (
                ':name' => $Name
        ) )) {
            $message = $Name . ' 已经存在';
            $this->addError ( $attribute, Yii::t ( 'basic', '{message}', array (
                    '{message}' => $message
            ) ) );
            return false;
        }
    }
    /**
     * 设置名称添加的时间
     */
    /*
     * public function beforeSave() { //$this->Dateline = time (); }
     */
    /**
     * 设置名称修改的时间
     */
/*     public function beforeUpdate() {
        $this->Dateline = time ();
    }
 */

    protected function afterFind() {
        $this->Dateline = date ( 'Y-m-d h:i:s', $this->Dateline );
    }

    /**
     *
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array (
                'ID' => 'ID',
                'Name' => '名称',
                'Effect' => '作用',
                'Description' => '描述',
                'Allusion' => '典故',
                'Use' => '是否使用',
                'Dateline' => '最后修改的时间'
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
        $criteria->compare ( 'Name', $this->Name, true );
        $criteria->compare ( 'Effect', $this->Effect, true );
        $criteria->compare ( 'Description', $this->Description, true );
        $criteria->compare ( 'Allusion', $this->Allusion, true );
        $criteria->compare ( 'Use', $this->Use, true );
        $criteria->compare ( 'Dateline', $this->Dateline );

        return new CActiveDataProvider ( $this, array (
                'criteria' => $criteria
        ) );
    }
}