<?php
    /* @var $this DefaultController */
    /* @var $model MongoModel */
    /* @var $dataProvider EMongoDocumentDataProvider */

    $this->breadcrumbs = array('MongoData');

    $this->menu=array(array('label'=>'Import CSV', 'url'=>array('import')));

?>


<h2>View a local information</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_form',
)); ?>


