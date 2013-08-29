<?php
/* @var $this GenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gens',
);

$this->menu=array(
	array('label'=>'Create Gen', 'url'=>array('create')),
	array('label'=>'Manage Gen', 'url'=>array('admin')),
);
?>

<h1>Gens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
