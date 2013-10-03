<?php

class Prosite extends CModel {
    
    //The properties of the Model
    public $sequence;
    public $start;
    public $stop;
    public $score;
    public $signature_ac;
    public $id;

    
    /**
     * Return an array with the attribute names
     * @return ArrayObject The attributeNames
     */
    public function attributeNames() {
        return array(
            'sequence'=>'Sequence',
            );
    }
    
    /**
    * @return array validation rules for model attributes.
    */
     public function rules() {
        return array (
            array('sequence', 'required')
        );          
    }
    
    /**
     * Create a connection with ExPASy using curl, and returns the results obtained.
     * @param string $pSequence The sequence for search.
     * @return ArrayObject The results data obtained.
     */
    public function accessToProsite($pSequence) {
        $service_url = 'http://prosite.expasy.org/cgi-bin/prosite/PSScan.cgi';  
        $curl = curl_init($service_url);
        $curl_post_data = array(
            "seq" => $pSequence,
            "output" => 'json'
            );
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
       curl_close($curl);
       $json_decode = json_decode($curl_response,true);
       $json =$json_decode['matchset'];
       return $this->createArrayObject($json);
    }
    
    /**
     * Create an array from a Json objetct.
     * @param string $pJson Json Object.
     * @return ArrayObject The results data.
     */
    private function createArrayObject($pJson) {
        if ($pJson != null) {
            foreach($pJson as $key) {
                $obj = new Prosite();
                $obj->start = $key['start'];
                $obj->stop = $key['stop'];
                $obj->signature_ac =  $key['signature_ac'];
                if(array_key_exists('score',$key))
                    $obj->score = $key['score'];
                $array[] = $obj;
            }        
            return $array;
        }
        return [];
    }
    
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MongoModel the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
    
}

?>
