<?php
/* @var $this DefaultController */
/* @var $model CSVFile */

$this->breadcrumbs = array(
    'Import' => array('import'),
    'Select File to Upload',
);

$this->menu=array(
	array('label'=>'List Excel', 'url'=>array('index')),
);

?>

<h2>Import a Database</h2>

<div class="form">
    <?php           
        $form = $this->beginWidget(
            'CActiveForm',
            array(
                'id' => 'upload-form',
                'enableAjaxValidation' => true,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )
        );
    ?>
    
    
    <div class="row">
        <?php echo $form->hiddenField($model, 'filepath'); ?>
        <?php echo $form->fileField($model, 'filepath', array('name'=>'filename')); ?>
        <?php echo $form->error($model,'filepath'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'species'); ?>
        <?php echo $form->textField($model, 'species', array('name'=>'species')); ?>
        <?php echo $form->error($model,'species'); ?>
    </div>
    
    <div class="row submit">
        <?php echo CHtml::submitButton('Import'); ?>
    </div>
        
    <?php $this->endWidget(); ?>
</div><!-- form -->