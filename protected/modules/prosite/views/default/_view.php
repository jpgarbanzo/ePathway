<?php
/* @var $this DefaultController */
/* @var $data Prosite */
?>

<div class="view">

    <b><?php echo CHtml::encode('Start'); ?>:</b>
        <?php echo CHtml::encode($data->start); ?>
    <br />
    
    <b><?php echo CHtml::encode('Stop'); ?>:</b>
        <?php echo CHtml::encode($data->stop); ?>
    <br />
    
    <b><?php echo CHtml::encode('Signature_ac'); ?>:</b>
        <?php echo CHtml::encode($data->signature_ac); ?>
    <br />    
    
    <b><?php echo CHtml::encode('Score'); ?>:</b>
        <?php echo CHtml::encode($data->score); ?>
    <br />    
        
</div>