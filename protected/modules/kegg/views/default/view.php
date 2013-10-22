<?php
    /* @var $this DefaultController */
    /* @var $pathway array*/

    $this->breadcrumbs = array('Pathway Information');
    
    $this->menu=array(
        array('label'=>'View local pathways',
            'url'=>array('/pathway')),
        array('label'=>'Search in KEGG',
            'url'=>array('index')),
    );
    
    Yii::app()->clientScript->registerScript('toggle', "
    $('.info-button').click(function(){
            $('.other-info').toggle();
            return false;
    });
    ");
?>

<?php
    foreach($pathway['important'] as $entry) {
        foreach ($entry as $key => $value) {
            echo "<b>";
            echo CHtml::encode($key);
            echo "</b><br /><br />&nbsp&nbsp&nbsp&nbsp";
            if ($key == 'ENTRY') {
                echo $value."<br />";
            } else {
                echo $value."<br />";
            }
        }
    }
?>

<?php echo CHtml::link('See More Information','#', array('class'=>'info-button')); ?>

<div class="other-info" style="display:none">
<?php
    echo "<br />";
    
    foreach($pathway['other'] as $entry) {
        foreach ($entry as $key => $value) {
            echo "<b>";
            echo CHtml::encode($key);
            echo "</b><br />&nbsp&nbsp&nbsp&nbsp";
            echo $value."<br />";
        }
    }
?>
</div>
