<?php
    /* @var $this DefaultController */
    /* @var $model MongoModel */

    $this->breadcrumbs = array('MongoData');

    $this->menu=array(array('label'=>'Import CSV', 'url'=>array('import')));

?>


<h2>View a local information</h2>

<?php

    echo $this->renderPartial('_form', array('model'=>$model)); 

?>


