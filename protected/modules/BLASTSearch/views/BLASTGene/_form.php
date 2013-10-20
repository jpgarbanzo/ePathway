<?php
/* @var $this BLASTGeneController */
/* @var $model BLASTGene */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blastgene-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'jobtitle'); ?>
		<?php echo $form->textField($model,'jobtitle',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'jobtitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sequencetype'); ?>
		<?php echo $form->textField($model,'sequencetype',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sequencetype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'program'); ?>
		<?php echo $form->textField($model,'program',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'program'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scores'); ?>
		<?php echo $form->textField($model,'scores'); ?>
		<?php echo $form->error($model,'scores'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alignments'); ?>
		<?php echo $form->textField($model,'alignments',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alignments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expectvalthreshold'); ?>
		<?php echo $form->textField($model,'expectvalthreshold',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'expectvalthreshold'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblEbidatabasesxblastuserconfigurations'); ?>
		<?php echo $form->ListBox($model,'tblEbidatabasesxblastuserconfigurations', 
                    array('1' => 'em_rel_pln','2' => 'em_rel_pln'), array('multiple'=>'multiple')); ?>
		<?php echo $form->error($model,'tblEbidatabasesxblastuserconfigurations'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->