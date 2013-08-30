<?php
/* @var $this AreainteresController */
/* @var $model Areainteres */

$this->breadcrumbs=array(
	'Areainteres'=>array('index'),
	$model->idtbl_areainteres=>array('view','id'=>$model->idtbl_areainteres),
	'Update',
);

$this->menu=array(
	array('label'=>'List Areainteres', 'url'=>array('index')),
	array('label'=>'Create Areainteres', 'url'=>array('create')),
	array('label'=>'View Areainteres', 'url'=>array('view', 'id'=>$model->idtbl_areainteres)),
	array('label'=>'Manage Areainteres', 'url'=>array('admin')),
);
?>

<h1>Update Areainteres <?php echo $model->idtbl_areainteres; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>