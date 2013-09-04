<?php
/* @var $this DefaultController */
/* @var $data MongoModel */
/* @var $form CActiveForm */
?>


<div class="view">

        <b><?php echo CHtml::encode('identificador'); ?>:</b>
	<?php echo CHtml::encode($data->getName()); ?>
	<br />
    
        <?php echo CHtml::link('View Details',array('gen/view','id'=>$data->idtbl_gen)) ?>


</div>