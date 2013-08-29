<?php
/* @var $this GenController */
/* @var $model Gen */

$this->breadcrumbs=array(
	'Gens'=>array('index'),
	$model->idtbl_gen,
);

$this->menu=array(
	array('label'=>'List Genes', 'url'=>array('index')),
	array('label'=>'Create Gene', 'url'=>array('create')),
	array('label'=>'Update Gene', 'url'=>array('update', 'id'=>$model->idtbl_gen)),
	array('label'=>'Delete Gene', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtbl_gen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Genes', 'url'=>array('admin')),
);
?>

<h1>View Gen #<?php echo $model->idtbl_gen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigoaccesion',
		'organismoorigen',
		'secuenciacompleta',
		'cds',
	),
)); ?>
