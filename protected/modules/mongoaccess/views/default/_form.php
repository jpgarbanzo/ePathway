<?php
/* @var $this DefaultController */
/* @var $model MongoModel */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'primer-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    
        
        <?php echo $form->errorSummary($model); ?>




    <div class="row">
        <?php
        
        $algo = $model->CollectionsNames;
        echo $form->dropDownList($model, "CollectionsNames",$algo, array('empty' => 'Select a collections'));
        ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('ViewData'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->