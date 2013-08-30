<?php
/* @var $this AreainteresController */
/* @var $model Areainteres */

$this->breadcrumbs=array(
	'Relevant Areas'=>array('index'),
	$model->idtbl_areainteres,
);

$this->menu=array(
	array('label'=>'List Relevant Areas', 'url'=>array('index')),
	array('label'=>'Update Relevant Areas', 'url'=>array('update', 'id'=>$model->idtbl_areainteres)),
	array('label'=>'Delete Relevant Areas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtbl_areainteres),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Relevant Areas', 'url'=>array('admin')),
);
?>

<h1>View Relevant Area #<?php echo $model->idtbl_areainteres; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtbl_areainteres',
		'secuenciainteres',
		'idtbl_gen',
	),
)); ?>
