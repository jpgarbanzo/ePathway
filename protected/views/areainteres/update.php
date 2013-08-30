<?php
/* @var $this AreainteresController */
/* @var $model Areainteres */

$this->breadcrumbs=array(
	'Relevant Areas'=>array('index'),
	$model->idtbl_areainteres=>array('view','id'=>$model->idtbl_areainteres),
	'Update',
);

$this->menu=array(
	array('label'=>'List Relevant Areas', 'url'=>array('index')),
	array('label'=>'View Relevant Areas', 'url'=>array('view', 'id'=>$model->idtbl_areainteres)),
	array('label'=>'Manage Relevant Areas', 'url'=>array('admin')),
);
?>

<h1>Update Relevant Areas <?php echo $model->idtbl_areainteres; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>