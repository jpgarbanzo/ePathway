<?php
/* @var $this AreainteresController */
/* @var $data Areainteres */
?>

<div class="view">
        <b><?php echo CHtml::encode($data->getAttributeLabel('gene')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->AccessCode->codigoaccesion), array('Gen/view', 'id'=>$data->idtbl_gen)); ?>
        <br/>
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('secuenciainteres')); ?>:</b>
	<?php echo CHtml::encode($data->secuenciainteres); ?>
	<br />
        
        <?php echo CHtml::link(CHtml::encode($data->getAttributeLabel('details')), array('view', 'id'=>$data->idtbl_areainteres)); ?>
	<br />
</div>