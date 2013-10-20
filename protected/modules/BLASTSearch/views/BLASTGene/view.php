<?php
/* @var $this BLASTGeneController */
/* @var $model BLASTGene */

$this->breadcrumbs=array(
	'Blastgenes'=>array('..'),
	$model->idtbl_blastuserconfiguration,
);

$this->menu=array(
	array('label'=>'Update BLASTGene', 'url'=>array('update', 'id'=>$model->idtbl_blastuserconfiguration)),
);
?>

<h1>View BLASTGene #<?php echo $model->idtbl_blastuserconfiguration; ?></h1>

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
