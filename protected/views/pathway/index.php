<?php
/* @var $this PathwayController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pathways',
);

$this->menu=array(
	array('label'=>'Create Pathway', 'url'=>array('create')),
	array('label'=>'Manage Pathway', 'url'=>array('admin')),
        array('label'=>'Search in KEGG', 'url'=>array('/kegg')),
);
?>

<h1>Pathways</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
