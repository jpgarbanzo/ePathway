<?php
/* 
 * @var $this DefaultController
 * @var $job_status The status for the current job, provided by EBI service
 * @var $job_id
 * @var $blast_data_provider
 * @var $result_columns
 */
$this->menu=array(
        array('label'=>'BLAST index', 'url'=>array('index')),
        array('label'=>'BLAST search', 'url'=>array('blastsearch'))
    );

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