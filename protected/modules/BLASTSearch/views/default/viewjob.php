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

        
        foreach ($blasted as $b) {
            echo 'Database: ' . $b->Database . '<br/>';
            echo 'ID: ' . $b->ID . '<br/>';
            echo 'AC: ' . $b->AC . '<br/>';
            echo 'Length: ' . $b->Length . '<br/>';
            echo 'Description: ' . $b->Description . '<br/>';

            echo 'Score: ' . $b->Score . '<br/>';
            echo 'Expectation: ' . $b->Expectation . '<br/>';
            echo 'Identity: ' . $b->Identity . '<br/>';
            echo 'Gaps: ' . $b->Gaps . '<br/>';
            echo 'Strand: ' . $b->Strand . '<br/>';
            echo 'Bits: ' . $b->Bits . '<br/>';
            echo 'QuerySeq: ' . $b->QuerySeq . '<br/>';
            echo 'Pattern: ' . $b->Pattern . '<br/>';
            echo 'MatchSeq: ' . $b->MatchSeq . '<br/>';

            echo '<br/><br/>';
        }
    }
?>