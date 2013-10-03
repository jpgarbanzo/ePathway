<?php
/* @var $this DefaultController */
/* @var $model Prosite */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
        $form = $this->beginWidget(
            'CActiveForm',
            array(
                'id' => 'prosite-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                'validateOnSubmit' => true),
            )
        );
    ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
         <div class="row">
        <?php echo $form->labelEx($model,'sequence'); ?>
        <?php echo $form->textArea($model,'sequence',array('size'=>60,'maxlength'=>5000)); ?>
        <?php echo $form->error($model,'sequence'); ?>
    </div>
    
    <div class="row submit">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->