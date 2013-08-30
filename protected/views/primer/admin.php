<?php
/* @var $this PrimerController */
/* @var $model Primer */

$this->breadcrumbs=array(
	'Primers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Primer', 'url'=>array('index')),
	array('label'=>'Create Primer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#primer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Primers</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'primer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'primerrinicio',
		'primerrlongitud',
		'primerfinicio',
		'primerflongitud',
		'observaciones',
		/*
		'idtbl_gen',
		'idtbl_estadoprimer',
		*/
                //array('name' => 'Status', 'value' => $model->getStatusFromStatusId($model->idtbl_estadoprimer)),
                array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
