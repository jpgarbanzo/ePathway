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

if($job_status === BLASTGene::$JOB_STATUS_FINISHED && $blast_data_provider != null){
    
    
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'blast-result-grid',
        'dataProvider' => $blast_data_provider,
        'columns'=> $result_columns,
    ));
    
//    echo $job_image_result;
}

?>