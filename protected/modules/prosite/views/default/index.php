<?php
/* @var $this DefaultController */
/* @var $model Prosite */

$this->breadcrumbs=array(
	'Search',
);

?>

<h1>Search Sequence Prosite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>