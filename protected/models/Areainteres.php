<?php

/**
 * This is the model class for table "tbl_areainteres".
 *
 * The followings are the available columns in table 'tbl_areainteres':
 * @property string $idtbl_areainteres
 * @property string $secuenciainteres
 * @property string $idtbl_gen
 *
 * The followings are the available model relations:
 * @property TblGen $idtblGen
 */
class Areainteres extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Areainteres the static model class
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
		return 'tbl_areainteres';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('secuenciainteres, idtbl_gen', 'required'),
			array('secuenciainteres', 'length', 'max'=>1500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_areainteres, secuenciainteres, idtbl_gen', 'safe', 'on'=>'search'),
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
			'idtblGen' => array(self::BELONGS_TO, 'TblGen', 'idtbl_gen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_areainteres' => 'Idtbl Areainteres',
			'secuenciainteres' => 'Relevant area',
			'idtbl_gen' => 'Idtbl Gen',
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

		$criteria->compare('idtbl_areainteres',$this->idtbl_areainteres,true);
		$criteria->compare('secuenciainteres',$this->secuenciainteres,true);
		$criteria->compare('idtbl_gen',$this->idtbl_gen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}