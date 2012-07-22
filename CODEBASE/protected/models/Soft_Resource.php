<?php

/**
 * This is the model class for table "top_softresource".
 *
 * The followings are the available columns in table 'top_softresource':
 * @property integer $ID
 * @property double $Version
 * @property integer $Type_ID
 * @property string $PATH_CG
 *
 * The followings are the available model relations:
 * @property TopSofttype $type
 */
class Soft_Resource extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     *
     * @param string $className
     *            active record class name.
     * @return Soft_Resource the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model ( $className );
    }
    
    /**
     *
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Soft_Resource';
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
                        'Version, Type_ID',
                        'required'
                ),
                array (
                        'Type_ID',
                        'numerical',
                        'integerOnly' => true
                ),
                array (
                        'Version',
                        'numerical'
                ),
                array (
                        'PATH_CG',
                        'length',
                        'max' => 255
                ),
                //array('PATH_CG','file'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array (
                        'ID, Version, Type_ID, PATH_CG',
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
        return array (
                'type' => array (
                        self::BELONGS_TO,
                        'TopSofttype',
                        'Type_ID'
                )
        );
    }
    
    /**
     *
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array (
                'ID' => 'ID',
                'Version' => 'Version',
                'Type_ID' => '资源类型',
                'PATH_CG' => '资源上传'
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
        $criteria->compare ( 'Version', $this->Version );
        $criteria->compare ( 'Type_ID', $this->Type_ID );
        $criteria->compare ( 'PATH_CG', $this->PATH_CG, true );
        
        return new CActiveDataProvider ( $this, array (
                'criteria' => $criteria
        ) );
    }
    /**
     *
     * @param unknown_type $name
     */
    public function getTypes($name = '') {
        $types = Soft_Type::model ();
        if ($name)
            $types->Type = $name;
        $types = $types->findAll ();
        $rt_ary = array ();
        foreach ( $types as $type ) {
            $rt_ary [$type->ID] = $type->Type;
        }
        return $rt_ary;
    }
    public function getType($name) {
        $type = $this->getType ( $name );
    }
}