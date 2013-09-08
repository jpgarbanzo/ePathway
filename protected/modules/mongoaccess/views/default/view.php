<?php
    /* @var $this DefaultController */
    /* @var $dataProvider EMongoDocumentDataProvider */
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

    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'components-grid',
            'dataProvider'=>$dataProvider,
            'columns'=>  $data,
        )); 
?>

