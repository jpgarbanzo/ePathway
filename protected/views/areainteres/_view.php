<?php
/* @var $this AreainteresController */
/* @var $data Areainteres */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_areainteres')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_areainteres), array('view', 'id'=>$data->idtbl_areainteres)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secuenciainteres')); ?>:</b>
	<?php echo CHtml::encode($data->secuenciainteres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_gen')); ?>:</b>
	<?php echo CHtml::encode($data->idtbl_gen); ?>
	<br />


</div>