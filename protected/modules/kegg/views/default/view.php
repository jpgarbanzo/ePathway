<?php
    /* @var $this DefaultController */
    /* @var $pathway string*/

    $this->breadcrumbs = array('Pathway Information');
    
    $this->menu=array(
        array('label'=>'View local pathways',
            'url'=>array('/pathway')),
        array('label'=>'Search in KEGG',
            'url'=>array('index')),
    );

    echo $pathway;
?>
