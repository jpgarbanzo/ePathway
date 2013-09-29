<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
        $this->module->id => array('index'),
	'Search'
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<?php
        $form = $this->beginWidget(
            'CActiveForm',
            array(
                'id' => 'blast-search-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true),
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )
        );
    ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
        
	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>50,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'JobTitle'); ?>
		<?php echo $form->textField($model,'JobTitle',array('size'=>50,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'JobTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SequenceType'); ?>
		<?php echo $form->textField($model,'SequenceType',array('size'=>50,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'SequenceType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sequence'); ?>
		<?php echo $form->textArea($model,'Sequence',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'Sequence'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Program'); ?>
		<?php echo $form->textField($model,'Program',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'Program'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->labelEx($model,'Database'); ?>
		<?php echo $form->textField($model,'Database',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'Database'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->labelEx($model,'Scores'); ?>
		<?php echo $form->textField($model,'Scores',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'Scores'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->labelEx($model,'Alignments'); ?>
		<?php echo $form->textField($model,'Alignments',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'Alignments'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->labelEx($model,'ExpectValThreshold'); ?>
		<?php echo $form->textField($model,'ExpectValThreshold',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'ExpectValThreshold'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('BLAST'); ?>
	</div>

<?php $this->endWidget(); ?>