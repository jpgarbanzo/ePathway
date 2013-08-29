<?php
/* @var $this GenController */
/* @var $data Gen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_gen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_gen), array('view', 'id'=>$data->idtbl_gen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoaccesion')); ?>:</b>
	<?php echo CHtml::encode($data->codigoaccesion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organismoorigen')); ?>:</b>
	<?php echo CHtml::encode($data->organismoorigen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secuenciacompleta')); ?>:</b>
	<?php echo CHtml::encode($data->secuenciacompleta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cds')); ?>:</b>
	<?php echo CHtml::encode($data->cds); ?>
	<br />


</div>