<?php
/* @var $this GenController */
/* @var $model Gen */

$this->breadcrumbs=array(
	'Gens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gen', 'url'=>array('index')),
	array('label'=>'Manage Gen', 'url'=>array('admin')),
);
?>

<h1>Create Gen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>