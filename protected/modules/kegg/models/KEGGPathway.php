<?php

class KEGGPathway extends CModel{
    
    public $Id;
    public $Entry;
    public $Name;
    public $Description;
    public $Class;
    public $Compound;
    public $Enzyme;
    public $Orthology;
    private $Result;
    
    public function attributeNames()
    {
        return array(
            'Entry'=>'Image',
            'Name'=>'Name',
            'Description'=>'Description',
            'Class'=>'Class',
            'Compound'=>'Compound',
            'Enzyme'=>'Enzyme',
            'Orthology' => 'Orthology',
            'Other'=>'Other'
        );
    }
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function search()
    {
        $model =  new KEGGPathway;
        $result = $this->getPathway($this->Id);
        
        $model->Entry = $result['important']['ENTRY'];
        $model->Name = $result['important']['NAME'];
        if (isset($result['important']['DESCRIPTION'])) {
            $model->Description = $result['important']['DESCRIPTION'];
        }
        $model->Class = $result['important']['CLASS'];
        if (isset($result['important']['COMPOUND'])) {
            $model->Compound = $result['important']['COMPOUND'];
        }
        if (isset($result['important']['ENZYME'])) {
            $model->Enzyme = $result['important']['ENZYME'];
        }
        if (isset($result['important']['ORTHOLOGY'])) {
            $model->Orthology = $result['important']['ORTHOLOGY'];
        }
        
        Yii::app()->session['pathway_info'] = $result['other'];
        
        return $model;
    }
    
    public function searchOtherInfo() {
        return Yii::app()->session['pathway_info'];
    }
    
    /**
     * Searchs for a specific pathway and retrieves all information
     * @param type $pPathwayId
     * @return array with all details of such pathway
     */
    private function getPathway($pPathwayId) {
        $curl = $this->openCURLConnection(KEGGPathway::$KEGG_GET . $pPathwayId);
        $result = curl_exec($curl);
        $result = preg_replace('/\n/', '<br />', $result);
        curl_close($curl);
        
        $pattern = '/' . KEGGPathway::$RELEVANT_INFO . KEGGPathway::$OTHER_INFO . '/';
        $result = preg_split($pattern, $result, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        
        $data['important'] = array();
        $data['other'] = array();
        for ($index = 0; $index < count($result); $index = $index + 2) {
            if (strpos(KEGGPathway::$RELEVANT_INFO, $result[$index]) !== false) {
                if ($result[$index] == 'ENTRY') {
                    $map = preg_split('/\s+/', $result[$index + 1]);
                    
                    $data['important'][$result[$index]] = 
                            "<a href=\"http://rest.kegg.jp/get/".$map[1]."/image"."\">Go to Image</a><br />";
                } else {
                    $data['important'][$result[$index]] = $result[$index + 1];       
                }
            } else {
                $data['other'][$result[$index]] = $result[$index + 1];
            }
        }
        
        return $data;
    }
    
    /**
     * Opens a connection with the specified URL
     * @param type $pURL
     * @return type curl object
     */
    private function openCURLConnection($pURL) {
        $curl = curl_init() or die(curl_error());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($curl, CURLOPT_URL, $pURL);
        
        return $curl;
    }
    
    private static $KEGG_GET = "http://rest.kegg.jp/get/";
    private static $RELEVANT_INFO = '(DESCRIPTION)|(ENTRY)|(NAME)|(ENZYME)|(COMPOUND)|(CLASS)|(ORTHOLOGY)|';
    private static $OTHER_INFO = '(PATHWAY_MAP)|(REFERENCE)|(DBLINKS)|(KO_PATHWAY)|(MODULE)|(DISEASE)';
}
    
?> 