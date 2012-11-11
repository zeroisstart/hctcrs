<?php

/**
 * This is the model class for table "soft_resource".
 *
 * The followings are the available columns in table 'soft_resource':
 * @property integer $ID
 * @property string $Name
 * @property integer $Size
 * @property string $Version
 * @property integer $Type_ID
 * @property string $PATH_CG
 * @property integer $Dateline
 *
 * The followings are the available model relations:
 * @property SoftType $type
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
        return 'soft_resource';
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
                        'Name, Size, Version, Type_ID, Dateline',
                        'required'
                ),
                array (
                        'Size, Type_ID, Dateline',
                        'numerical',
                        'integerOnly' => true
                ),
                array (
                        'Name',
                        'length',
                        'max' => 200
                ),
                array (
                        'Version',
                        'length',
                        'max' => 100
                ),
                array (
                        'PATH_CG',
                        'length',
                        'max' => 255
                ),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array (
                        'ID, Name, Size, Version, Type_ID, PATH_CG, Dateline',
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
                        'SoftType',
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
                'Name' => 'Name',
                'Size' => 'Size',
                'Version' => 'Version',
                'Type_ID' => 'Type',
                'PATH_CG' => 'Path Cg',
                'Dateline' => 'Dateline',
                'Version' => '版本',
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
        $criteria->compare ( 'Name', $this->Name, true );
        $criteria->compare ( 'Size', $this->Size );
        $criteria->compare ( 'Version', $this->Version, true );
        $criteria->compare ( 'Type_ID', $this->Type_ID );
        $criteria->compare ( 'PATH_CG', $this->PATH_CG, true );
        $criteria->compare ( 'Dateline', $this->Dateline );

        return new CActiveDataProvider ( $this, array (
                'criteria' => $criteria
        ) );
    }

    /**
     *
     * @param string $name
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