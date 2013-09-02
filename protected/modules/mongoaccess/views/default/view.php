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

<?php
$algo = $data->getSoftAttributeNames();
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProvider,
        'columns' => array(
            array(
                'name' => $algo[0],
                'type' => 'raw',
                'value' => 'CHtml::encode($data->ID)'
            ),
            array(
                'name' => $algo[2],
                'type' => 'raw',
                'value' => 'CHtml::encode($data->Species)'
            ),
        ),
    ));
?>


