<?php
/* @var $this DefaultController */
/* @var $model MongoModel */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'collection-form',
        'enableAjaxValidation' => false,
    ));
    ?>
            
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php        
        echo $form->labelEx($model, 'collection_name');
        echo $form->dropDownList($model, 'collection_name',$model->CollectionsNames, array('empty' => 'Select a collections'));
        echo $form->error($model, 'collection_name');
        ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('ViewData'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->