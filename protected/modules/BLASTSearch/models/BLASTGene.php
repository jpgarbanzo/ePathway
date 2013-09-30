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

    // <editor-fold defaultstate="collapsed" desc="EBI interaction functions">
    public function requestBLASTSearch($pEmail, $pProgram, $pDatabase, $pSequence, $pSequenceType, $pOutput) {

        $service_url = 'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/run/';
        $curl = curl_init($service_url);
        $curl_post_data = array(
            "email" => $pEmail,
            "program" => $pProgram, //'blastn',
            "database" => $pDatabase, //'em_rel_pln',
            "sequence" => $pSequence, //"AATCGATCGATGCTAGCTAGCTGACCACACACTGTTGCTGATCGATCGTAGCTAGCTGTGTGTACTACACCACACTGACTATCG",
            "stype" => $pSequenceType, //'dna',
            "output" => $pOutput //'xml'
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        //$xml = new SimpleXMLElement($curl_response);
        //print_r($curl_response);

        return $curl_response;
    }

    public function getParameterDetails() {
        $service_url = 'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/run/';
        $curl = curl_init($service_url);
        $curl_post_data = array(
            "email" => '@.com',
                //"output" => 'xml',
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
        $curl_response = curl_exec($curl);
        curl_close($curl);


        $xml = new SimpleXMLElement($curl_response);
        print_r($xml);
    }

    public function getJobStatus($pJobId) {
        $service_url = 'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/status/' . $pJobId;  //'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/result/';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);

        return $curl_response;
    }

    public function getXMLJobResult($pJobId) {
        if ($this->getJobStatus($pJobId) === 'FINISHED') {
            $service_url = 'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/result/' . $pJobId . '/xml';  //'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/result/';
            $curl = curl_init($service_url);
            $curl_post_data = array(
                "jobId" => 'ncbiblast-R20130929-064438-0746-16156928-pg',
                'resultType' => 'xml',
            );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPGET, true);
            //curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
            $curl_response = curl_exec($curl);
            curl_close($curl);

            $xml = new SimpleXMLElement($curl_response);
            return $xml;
        }else{
            return null;
        }
//        print_r($xml);
    }

    // </editor-fold>
}

?>
