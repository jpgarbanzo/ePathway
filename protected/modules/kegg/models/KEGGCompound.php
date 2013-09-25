    <?php

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
    
    public function search()
    {
        if (isset($_GET['KEGGCompound'])) {
            $data = $this->searchCompound($_GET['KEGGCompound']['CompoundName']);
            $data_provider = new CArrayDataProvider($data, array(
                'pagination'=>array(
                    'pageSize'=>10,
                    ),
            ));
        } else {
            $data_provider = new CArrayDataProvider(array(), array(
                'pagination'=>array(
                    'pageSize'=>10,
                    ),
            ));
        }
        
        return $data_provider;
    }
    
    private function searchCompound($pCompounds) {
        $keywords = str_replace(" ", "+", $pCompounds);
        $kegg_url = "http://rest.kegg.jp/find/compound/".$keywords;
        $curl = $this->openCURLConnection($kegg_url);
        $result = curl_exec($curl);
        curl_close($curl);

        $pattern = '/(cpd:\w+\t)/';
        $result = preg_split($pattern, $result, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        
        $array_provider = array();
        
        for ($index = 0; $index < count($result); $index = $index + 2) {
            $pathways = $this->linkPathwaysByCompound($result[$index]);
            
            array_push($array_provider, array(
                'id' => $result[$index],
                'name' => $result[$index + 1],
                'pathways' => $pathways,
            ));
        }
        return $array_provider;
    }
    
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
    
    private function getPathway($pPathwayId) {
        $kegg_url = "http://rest.kegg.jp/get/".$pPathwayId;
        $curl = $this->openCURLConnection($kegg_url);
        $result = curl_exec($curl);
        curl_close($curl);
        
        return $result;
    }
    
    private function openCURLConnection($pURL) {
        $curl = curl_init() or die(curl_error());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($curl, CURLOPT_URL, $pURL);
        
        return $curl;
    }
}

?>
