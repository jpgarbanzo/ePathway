<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>

<?php
 function getBLASTSearch($pSequence) {
        $service_url = 'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/run/';  
        $curl = curl_init($service_url);
        $curl_post_data = array(
            "email" => 'correo@mail.com',
            "program" => 'blastn',
            "database" => 'em_rel_pln',
            "sequence" => "AATCGATCGATGCTAGCTAGCTGACCACACACTGTTGCTGATCGATCGTAGCTAGCTGTGTGTACTACACCACACTGACTATCG",
            "stype" => 'dna',
            "output" => 'xml'
            );
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
       curl_close($curl);
       
 
       //$xml = new SimpleXMLElement($curl_response);
       print_r($curl_response);
    }
    
    function getParameterDetails() {
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
    
    function getJobStatus($pJobId){
        $service_url = 'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/status/' . $pJobId;  //'http://www.ebi.ac.uk/Tools/services/rest/ncbiblast/result/';
        $curl = curl_init($service_url);
        //$curl_post_data = array(
        //    "jobId" => 'ncbiblast-R20130929-064438-0746-16156928-pg',
            //'resultType' => 'xml',
            
        //    );
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_HTTPGET, true);
       //curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
       curl_close($curl);
        
       print_r($curl_response);
    }
    
    
    function getJob($pJobId){
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
        
       print_r($xml);
    }
    
    

    //getBLASTSearch('AC');
    getJob('ncbiblast-R20130929-064438-0746-16156928-pg');

?>

