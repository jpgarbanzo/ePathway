<?php
/* @var $this DefaultController */
/* @var $dataProvider EMongoDocumentDataProvider */

$this->breadcrumbs = array(
    'MongoData',
);

$this->menu=array(
	array('label'=>'Import CSV', 'url'=>array('import')),
);

?>


<h2>View a local information</h2>

<?php

    echo $this->renderPartial('_form', array('model'=>$model)); 
	$this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider' => $dataProvider,
	    'columns' => array(
	        array(
	            'name' => 'Algo',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data->ID)'
	        ),
                   array(
	            'name' => 'Species',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data->Species)'
	        ),
	    ),
	));


?>
