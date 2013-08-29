<?php
/* @var $this GenController */
/* @var $model Gen */

$this->breadcrumbs=array(
	'Gens'=>array('index'),
	$model->idtbl_gen=>array('view','id'=>$model->idtbl_gen),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gen', 'url'=>array('index')),
	array('label'=>'Create Gen', 'url'=>array('create')),
	array('label'=>'View Gen', 'url'=>array('view', 'id'=>$model->idtbl_gen)),
	array('label'=>'Manage Gen', 'url'=>array('admin')),
);
?>

<h1>Update Gen <?php echo $model->idtbl_gen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>