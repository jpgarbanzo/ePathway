<?php
/* @var $this AreainteresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Areainteres',
);

$this->menu=array(
	array('label'=>'Create Areainteres', 'url'=>array('create')),
	array('label'=>'Manage Areainteres', 'url'=>array('admin')),
);
?>

<h1>Areainteres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
