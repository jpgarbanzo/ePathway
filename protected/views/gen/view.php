<?php
/* @var $this GenController */
/* @var $model Gen */

$this->breadcrumbs = array(
    'Genes' => array('index'),
    $model->codigoaccesion,
);

$this->menu = array(
    array('label' => 'List Genes', 'url' => array('index')),
    array('label' => 'Create Gene', 'url' => array('create')),
    array('label' => 'Update Gene', 'url' => array('update', 'id' => $model->idtbl_gen)),
    array('label' => 'Delete Gene', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idtbl_gen), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Genes', 'url' => array('admin')),
    array('label' => 'Add a primer', 'url' => array('primer/create','id' => $model->idtbl_gen,'pAccessCode'=>$model->codigoaccesion)),
    array('label' => 'Add a relevant area', 'url' => array('areainteres/create','pGen' => $model->idtbl_gen,'pAccessCode'=>$model->codigoaccesion)),
);
?>

<h1>View Gene <?php echo $model->codigoaccesion; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'codigoaccesion',
        'identificador',
        'organismoorigen',
        'secuenciacompleta',
        'cds',
    ),
));
?>
