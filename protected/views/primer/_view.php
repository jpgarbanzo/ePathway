<?php
/* @var $this PrimerController */
/* @var $data Primer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_primer')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_primer), array('view', 'id'=>$data->idtbl_primer)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primerrinicio')); ?>:</b>
	<?php echo CHtml::encode($data->primerrinicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primerrlongitud')); ?>:</b>
	<?php echo CHtml::encode($data->primerrlongitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primerfinicio')); ?>:</b>
	<?php echo CHtml::encode($data->primerfinicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primerflongitud')); ?>:</b>
	<?php echo CHtml::encode($data->primerflongitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_gen')); ?>:</b>
	<?php echo CHtml::encode($data->idtbl_gen); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_estadoprimer')); ?>:</b>
	<?php echo CHtml::encode($data->idtbl_estadoprimer); ?>
	<br />

	*/ ?>

</div>