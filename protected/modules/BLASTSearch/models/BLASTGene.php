<?php

class BLASTGene extends CModel {

    /**
     *
     * @property string $Email
     * @property string $JobTitle
     * 
     */
    
    public $Email;
    public $JobTitle;
    public $SequenceType;
    public $Sequence;
    public $Program;
    public $Database;
    public $Scores;
    public $Alignments;
    public $ExpectValThreshold;
    
      /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Gen the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Email,SequenceType,Sequence,Program,Database', 'required'),
            

            array('email', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Email,SequenceType,Sequence,Program,Database', 'safe', 'on' => 'search'),
        );
    }

//	/**
//	 * @return array relational rules.
//	 */
//	public function relations()
//	{
//		// NOTE: you may need to adjust the relation name and the related
//		// class name for the relations automatically generated below.
//		return array(
//			'tblAreainteres' => array(self::HAS_MANY, 'TblAreainteres', 'idtbl_gen'),
//			'tblPrimers' => array(self::HAS_MANY, 'Primer', 'idtbl_gen'),
//			'tblGenporrutametabolicas' => array(self::HAS_MANY, 'TblGenporrutametabolica', 'idtbl_gen'),
//		);
//	}

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Email' => 'e-mail',
            'JobTitle' => 'Job Title',
            'SequenceType' => 'Sequence Type',
            'Sequence' => 'Sequence',
            'Program' => 'Program',
            'Database' => 'Database',
            'Scores' => 'Scores',
            'Alignments' => 'Alignments',
            'ExpectValThreshold' => 'Expectation Value Threshold',
        );
    }
    
    public function attributeNames(){
        return array(
            'Email' => 'e-mail',
            'JobTitle' => 'Job Title',
            'SequenceType' => 'Sequence Type',
            'Sequence' => 'Sequence',
            'Program' => 'Program',
            'Database' => 'Database',
            'Scores' => 'Scores',
            'Alignments' => 'Alignments',
            'ExpectValThreshold' => 'Expectation Value Threshold',
        );
    }

}

?>
