<?php
/* @var $this PrimerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Primers',
);

$this->menu=array(
	array('label'=>'Create Primer', 'url'=>array('create')),
	array('label'=>'Manage Primer', 'url'=>array('admin')),
);
?>

<h1>Primers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
