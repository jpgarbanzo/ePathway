<?php
    /* @var $model KEGGCompound */
    /* @var $dataProvider CArrayDataProvider */

    $this->breadcrumbs = array('Search in KEGG');
    
    $this->menu=array(
        array('label'=>'View local pathways', 'url'=>array('/pathway')),
    );
    
    /*Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function(){
            $('#kegg-list').yiiListView('update', {
                    data: $(this).serialize()
            });
            return false;
    });
    ");*/
?>

<h2>Search in KEGG</h2>

<div class="search-form">
    <?php 
        $this->renderPartial('_search', array(
            'model'=> $model,
        )); 
    ?>
</div><!-- search-form -->

<!--div class="extended-grid"-->
    <?php
        $this->widget('zii.widgets.CListView', array(
            'id' => 'kegg-list',
            'dataProvider' => $model->search(),
            'itemView' => '_view',
            'ajaxUpdate' => true,
        ));
    ?>
<!--/div-->