<?php
/* @var $this BLASTGeneController */
/* @var $model BLASTGene */

$this->breadcrumbs=array(
	'BLAST Search'=>array('..'),
	'Configuration',
);

$this->menu=array(
	array('label'=>'View Stored Configuration', 'url'=>array('view')),
);
?>

<h1>Configure your BLAST default configuration <?php echo $model->idtbl_blastuserconfiguration; ?></h1>

<?php echo $this->renderPartial('/BLASTGene/_form', array('model'=>$model)); ?>