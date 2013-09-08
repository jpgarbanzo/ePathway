<?php
    /* @var $this DefaultController */
    /* @var $dataProvider EMongoDocumentDataProvider */
    /* @var $model MongoModel */
    /* @var $data MongoModel */

    $this->breadcrumbs = array(
        'MongoData'
    );

    $this->menu=array(
        array('label'=>'Import CSV', 'url'=>array('import')),
        array('label'=>'View Local Data', 'url'=>array('index')),
    );
?>


<h2>View a local information</h2>
COG_ONTOLOGY
<?php
$algo = $data->getSoftAttributeNames();

        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
         'columns' => array(
	        array(
	            'name' => 'ID',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data->ID)'
	        ),
                   array(
	            'name' => 'Species',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data->Species)'
	        ),
              array(
	            'name' => 'COG_ONTOLOGY',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data->COG_ONTOLOGY)'
	        ),
              array(
	            'name' => 'GOTERM_BP_FAT',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data->GOTERM_BP_FAT)'
	        ),
	    ),
        ));
?>

