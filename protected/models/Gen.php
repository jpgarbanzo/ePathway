<?php

/**
 * This is the model class for table "tbl_gen".
 *
 * The followings are the available columns in table 'tbl_gen':
 * @property string $idtbl_gen
 * @property string $codigoaccesion
 * @property string $organismoorigen
 * @property string $secuenciacompleta
 * @property string $cds
 *
 * The followings are the available model relations:
 * @property TblAreainteres[] $tblAreainteres
 * @property TblPrimer[] $tblPrimers
 * @property TblGenporrutametabolica[] $tblGenporrutametabolicas
 */
class Gen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gen the static model class
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
		return 'tbl_gen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoaccesion, organismoorigen', 'required'),
			array('codigoaccesion', 'length', 'max'=>50),
			array('organismoorigen', 'length', 'max'=>300),
			array('secuenciacompleta', 'length', 'max'=>5000),
			array('cds', 'length', 'max'=>1500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_gen, codigoaccesion, organismoorigen, secuenciacompleta, cds', 'safe', 'on'=>'search'),
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
			'tblAreainteres' => array(self::HAS_MANY, 'TblAreainteres', 'idtbl_gen'),
			'tblPrimers' => array(self::HAS_MANY, 'TblPrimer', 'idtbl_gen'),
			'tblGenporrutametabolicas' => array(self::HAS_MANY, 'TblGenporrutametabolica', 'idtbl_gen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_gen' => 'Idtbl Gen',
			'codigoaccesion' => 'Codigoaccesion',
			'organismoorigen' => 'Organismoorigen',
			'secuenciacompleta' => 'Secuenciacompleta',
			'cds' => 'Cds',
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

		$criteria->compare('idtbl_gen',$this->idtbl_gen,true);
		$criteria->compare('codigoaccesion',$this->codigoaccesion,true);
		$criteria->compare('organismoorigen',$this->organismoorigen,true);
		$criteria->compare('secuenciacompleta',$this->secuenciacompleta,true);
		$criteria->compare('cds',$this->cds,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}