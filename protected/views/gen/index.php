<?php
/* @var $this GenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Genes',
);

$this->menu=array(
	array('label'=>'Create Gene', 'url'=>array('create')),
	array('label'=>'Manage Genes', 'url'=>array('admin')),
);
?>

<h1>Genes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
