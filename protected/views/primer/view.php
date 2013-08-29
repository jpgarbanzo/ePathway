<?php
/* @var $this PrimerController */
/* @var $model Primer */

$this->breadcrumbs=array(
	'Primers'=>array('index'),
	$model->idtbl_primer,
);

$this->menu=array(
	array('label'=>'List Primer', 'url'=>array('index')),
	array('label'=>'Create Primer', 'url'=>array('create')),
	array('label'=>'Update Primer', 'url'=>array('update', 'id'=>$model->idtbl_primer)),
	array('label'=>'Delete Primer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtbl_primer),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Primer', 'url'=>array('admin')),
);
?>

<h1>View Primer #<?php echo $model->idtbl_primer; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtbl_primer',
		'primerrinicio',
		'primerrlongitud',
		'primerfinicio',
		'primerflongitud',
		'observaciones',
		'idtbl_gen',
		'idtbl_estadoprimer',
	),
)); ?>
