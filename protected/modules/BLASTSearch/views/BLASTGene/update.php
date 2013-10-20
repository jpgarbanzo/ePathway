<?php
/* @var $this BLASTGeneController */
/* @var $model BLASTGene */

$this->breadcrumbs=array(
	'Blastgenes'=>array('..'),
	$model->idtbl_blastuserconfiguration=>array('view','id'=>$model->idtbl_blastuserconfiguration),
	'Update',
);

$this->menu=array(
	array('label'=>'View BLASTGene', 'url'=>array('view', 'id'=>$model->idtbl_blastuserconfiguration)),
);
?>

<h1>Update BLASTGene <?php echo $model->idtbl_blastuserconfiguration; ?></h1>

<?php echo $this->renderPartial('/BLASTGene/_form', array('model'=>$model)); ?>