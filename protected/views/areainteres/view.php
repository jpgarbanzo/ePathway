<?php
/* @var $this AreainteresController */
/* @var $model Areainteres */

$this->breadcrumbs=array(
	'Areainteres'=>array('index'),
	$model->idtbl_areainteres,
);

$this->menu=array(
	array('label'=>'List Relevant Area', 'url'=>array('index')),
	array('label'=>'Create Relevant Area', 'url'=>array('create')),
	array('label'=>'Update Relevant Area', 'url'=>array('update', 'id'=>$model->idtbl_areainteres)),
	array('label'=>'Delete Relevant Area', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtbl_areainteres),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Relevant Area', 'url'=>array('admin')),
);
?>

<h1>View Areainteres #<?php echo $model->idtbl_areainteres; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtbl_areainteres',
		'secuenciainteres',
		'idtbl_gen',
	),
)); ?>
