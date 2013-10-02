<?php
/* 
 * @var $this DefaultController
 */
$this->menu=array(
        array('label'=>'BLAST index', 'url'=>array('index')),
        array('label'=>'BLAST search', 'url'=>array('blastsearch'))
    );

$this->breadcrumbs=array(
        $this->module->id => array('index'),
	'Gene Details'
);
?>

<h1>Details for gene <?php echo $access_code ?> </h1>


<?php
echo $gene_details;

?>