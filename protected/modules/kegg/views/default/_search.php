<?php
    /* @var $model KEGGCompound */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    
<div class="row">
    <?php echo $form->label($model, "CompoundName"); ?>
    <?php echo $form->textField($model, "CompoundName"); ?>
</div>
    
<div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
