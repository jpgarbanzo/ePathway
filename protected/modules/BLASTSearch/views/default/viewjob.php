<?php
/* @var $this DefaultController */
$this->menu=array(
        array('label'=>'BLAST index', 'url'=>array('index')));

$this->breadcrumbs=array(
        $this->module->id => array('index'),
	'Job Status'
);
?>

<h1>Job <?php echo $job_status ?> </h1>
<h3>Job's ID: <?php echo $job_id ?> </h3>


<?php



    if($job_status === 'FINISHED'){
//        $arr = (array)$job_result;
//        $header = (array)$arr['Header'];
//        
//        $SequenceSimilaritySearchResult = (array)$arr['SequenceSimilaritySearchResult'];
//        $sssr = (array)$SequenceSimilaritySearchResult['hits'];
//        
//        print_r($sssr);
        
        
        $arr = (array)$job_result->SequenceSimilaritySearchResult->hits;
        $arr2 = $arr['hit'];
    foreach ($arr2 as $key => $value) {
        
        $elem = (array)$arr2[$key];
        
        echo 'Database: ' . $arr2[$key]['database'] . '<br/>';
        echo 'ID: ' . $arr2[$key]['id'] . '<br/>';
        echo 'AC: ' . $arr2[$key]['ac'] . '<br/>';
        echo 'Length: ' . $arr2[$key]['length'] . '<br/>';
        echo 'Description: ' . $arr2[$key]['description'] . '<br/>';
        
        
        
        //$alignments = (array)$arr2[$key]['alignment'];
        
//        foreach ($alignments as $key2 => $value2) {
//            print_r($arr2[$key]['alignment'][$key2]);
//        }
        
        //print_r($alignments);
        
        //print_r((array)$arr2[$key]['database']);
        echo '<br/><br/>';
    }
        //print_r($arr2);
        
        //print_r((array)$job_result->SequenceSimilaritySearchResult->hits);
        //print_r(array_keys($header));
    
    
    
    
    
    echo 'LOLZ <br/>';
    
    
        foreach ($job_result->SequenceSimilaritySearchResult->hits->children() as $hit){
            print_r($hit);
            
            foreach($hit->children() as $data){
                echo '<br/>->';
                print_r($data);
                echo '<-<br/>';
            }
            
                echo 'Database: ' . $hit->attributes()->{'database'} . '<br/>';
                echo 'ID: ' . $hit->attributes()->{'id'} . '<br/>';
                echo 'AC: ' . $hit->attributes()->{'ac'} . '<br/>';
                echo 'Length: ' . $hit->attributes()->{'length'} . '<br/>';
                echo 'Description: ' . $hit->attributes()->{'description'} . '<br/>';
            
        }
    
    
    
    
    
    
    
    
    }

?>