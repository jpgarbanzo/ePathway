<?php
/* @var $this BLASTGeneController */
/* @var $model BLASTGene */

$this->breadcrumbs=array(
	'BLAST Search'=>array('..'),
	'Check Configuration',
);

$this->menu=array(
	array('label'=>'Modify configuration', 'url'=>array('configuration')),
);
?>

<h1>BLAST configuration</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtbl_blastuserconfiguration',
		'jobtitle',
		'sequencetype',
		'program',
		'scores',
		'alignments',
		'expectvalthreshold',
		'idtbl_user',
		'idtbl_ebidatabases',
	),
)); ?>
