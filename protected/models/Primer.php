<?php

/**
 * This is the model class for table "tbl_primer".
 *
 * The followings are the available columns in table 'tbl_primer':
 * @property string $idtbl_primer
 * @property integer $primerrinicio
 * @property integer $primerrlongitud
 * @property integer $primerfinicio
 * @property integer $primerflongitud
 * @property string $observaciones
 * @property string $idtbl_gen
 * @property string $idtbl_estadoprimer
 *
 * The followings are the available model relations:
 * @property TblGen $idtblGen
 * @property TblEstadoprimer $idtblEstadoprimer
 * 
 * @property $PrimerStatus Primer Status List
 */
class Primer extends CActiveRecord {

    public $PrimerStatus;
    
    // <editor-fold defaultstate="collapsed" desc="Yii functions">
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Primer the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_primer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('primerrinicio, primerrlongitud, primerfinicio, primerflongitud, idtbl_gen, idtbl_estadoprimer', 'required'),
            array('primerrinicio, primerrlongitud, primerfinicio, primerflongitud', 'numerical', 'integerOnly' => true),
            array('observaciones', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('idtbl_primer, primerrinicio, primerrlongitud, primerfinicio, primerflongitud, observaciones, idtbl_gen, idtbl_estadoprimer', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idtblGen' => array(self::BELONGS_TO, 'TblGen', 'idtbl_gen'),
            'idtblEstadoprimer' => array(self::BELONGS_TO, 'TblEstadoprimer', 'idtbl_estadoprimer'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idtbl_primer' => 'Idtbl Primer',
            'primerrinicio' => 'Primerrinicio',
            'primerrlongitud' => 'Primerrlongitud',
            'primerfinicio' => 'Primerfinicio',
            'primerflongitud' => 'Primerflongitud',
            'observaciones' => 'Observaciones',
            'idtbl_gen' => 'Idtbl Gen',
            'idtbl_estadoprimer' => 'Idtbl Estadoprimer',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idtbl_primer', $this->idtbl_primer, true);
        $criteria->compare('primerrinicio', $this->primerrinicio);
        $criteria->compare('primerrlongitud', $this->primerrlongitud);
        $criteria->compare('primerfinicio', $this->primerfinicio);
        $criteria->compare('primerflongitud', $this->primerflongitud);
        $criteria->compare('observaciones', $this->observaciones, true);
        $criteria->compare('idtbl_gen', $this->idtbl_gen, true);
        $criteria->compare('idtbl_estadoprimer', $this->idtbl_estadoprimer, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Database custom actions">
    public function retrievePrimerStatusList(){
        $call = 'SELECT * FROM getprimerstatuslist()';
        $connection = Yii::app()->db;
        $command = $connection->createCommand($call);
        //$command->bindParam(':pIdProyecto', $pIdProyecto, PDO::PARAM_INT);
        $result = $command->queryAll();

        if ($result == false)
            return null;
        else {
            return $result;
        }
    }
    // </editor-fold>
}