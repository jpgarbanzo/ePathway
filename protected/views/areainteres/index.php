<?php
/* @var $this AreainteresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Relevant Areas',
);

$this->menu=array(
	array('label'=>'Manage Relevant Areas', 'url'=>array('admin')),
);
?>

<h1>Relevant Areas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
