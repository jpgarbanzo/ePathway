<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

class KEGGCompound extends CModel 
{
    public $CompoundId;
    public $CompoundName;
    
    public function attributeNames()
    {
        return array(
            'CompoundId'=>'Identifier',
            'CompoundName'=>'Compound Name',
        );
    }
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * Searches through compound database in KEGG.
     * Also looks for links in pathway database to show all
     * related pathways.
     * @return \CArrayDataProvider with data to be displayed in a
     * CListView
     */
    public function search()
    {
        if (isset($_GET['KEGGCompound'])) {
            if ($_GET['KEGGCompound'] == '') {
                $data_provider = new CArrayDataProvider(array());
                unset(Yii::app()->session['query']);
                unset(Yii::app()->session['results']);
            }
            elseif ($_GET['KEGGCompound']['CompoundName'] == Yii::app()->session['query']) {
                $data_provider = new CArrayDataProvider(Yii::app()->session['results'], array(
                    'pagination' => array(
                        'pageSize' => 10,
                        ),
                ));
            }
            else {
                $data = $this->searchCompound($_GET['KEGGCompound']['CompoundName']);
                $data_provider = new CArrayDataProvider($data, array(
                    'pagination' => array(
                        'pageSize' => 10,
                        ),
                ));
                Yii::app()->session['query'] = $_GET['KEGGCompound']['CompoundName'];
                Yii::app()->session['results'] = $data;
            }
        } else {
            $data_provider = new CArrayDataProvider(array());
            unset(Yii::app()->session['query']);
            unset(Yii::app()->session['results']);
        }
        
        return $data_provider;
    }
    
    /**
     * Returns an array with all compounds matching 
     * the specified compound in $pCompounds.
     * @param type $pCompounds
     * @return array with compounds and its related pathways
     */
    private function searchCompound($pCompounds) {
        $keywords = str_replace(" ", "+", $pCompounds);
        $kegg_url = "http://rest.kegg.jp/find/compound/".$keywords;
        $curl = $this->openCURLConnection($kegg_url);
        $result = curl_exec($curl);
        curl_close($curl);

        $pattern = '/(cpd:\w+\t)/';
        $result = preg_split($pattern, $result, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        
        $array_provider = array();
        
        if (count($result) > 1) {
            for ($index = 0; $index < count($result); $index = $index + 2) {
                $pathways = $this->linkPathwaysByCompound($result[$index]);

                array_push($array_provider, array(
                    'id' => $result[$index],
                    'name' => $result[$index + 1],
                    'pathways' => $pathways,
                ));
            }
        }
        return $array_provider;
    }
    
    /**
     * Returns all pathways linked to a specific compound
     * @param type $pCompound
     * @return type array with resulting pathway identifiers
     */
    private function linkPathwaysByCompound($pCompound)
    {
        $kegg_url = "http://rest.kegg.jp/link/pathway/".$pCompound;
        $curl = $this->openCURLConnection($kegg_url);
        $result = curl_exec($curl);
        curl_close($curl);
        
        $pattern = '/(cpd:\w+\t)/';
        $result = preg_split($pattern, $result);
        
        return $result;
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
}

?>
