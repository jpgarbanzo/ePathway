<?php
/* @var $this AreainteresController */
/* @var $model Areainteres */

$this->breadcrumbs=array(
	'Areainteres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Areainteres', 'url'=>array('index')),
	array('label'=>'Manage Areainteres', 'url'=>array('admin')),
);
?>

<h1>Create Areainteres</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>