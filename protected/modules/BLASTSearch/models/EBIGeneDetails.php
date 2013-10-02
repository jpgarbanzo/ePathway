<?php

class EBIGeneDetails extends CModel {

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

    // <editor-fold defaultstate="collapsed" desc="Methods">
    // </editor-fold>

    /**
     * Singleton pattern implementation
     */
    public static function getInstance() {
        if (!isset(EBIGeneDetails::$_Instance))
            EBIGeneDetails::$_Instance = new EBIGeneDetails();

        return EBIGeneDetails::$_Instance;
    }

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
            array('Email', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Email,SequenceType,Sequence,Program,Database', 'safe', 'on' => 'search'),
        );
    }

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

    public function attributeNames() {
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

    // <editor-fold defaultstate="collapsed" desc="EBI API interaction functions">
    public function getEBIGeneDetails($pGeneAccessCode) {
        $service_url = EBIGeneDetails::$EBI_GENE_DETAILS_URL . $pGeneAccessCode . '&display=xml';
        $curl = curl_init($service_url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, true);

        $curl_response = curl_exec($curl);
        curl_close($curl);

        return $curl_response;
    }

    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Private Attributes">
    private static $_Instance; //for singleton
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Constants (service URLs, parameter names...)">
    private static $EBI_GENE_DETAILS_URL = 'http://www.ebi.ac.uk/ena/data/view/';
    // </editor-fold>
}

?>