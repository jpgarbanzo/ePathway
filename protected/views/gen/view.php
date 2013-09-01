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
        //'secuenciacompleta',
        array(
            'label'=>$model->getAttributeLabel('secuenciacompleta'),
            'type'=>'raw',
            'value'=>'<textarea readonly="readonly" class="dna" id="sequence">' . $model->secuenciacompleta . '</textarea>',
        ),
        array(
            'label'=>$model->getAttributeLabel('cds'),
            'type'=>'raw',
            'value'=>'<textarea readonly="readonly" class="dna" id="cds">' . $model->cds . '</textarea>',
        ),
    ),
));
?>
<br/><br/>
<ul class="big-menu">
    <li>
        <?php echo CHtml::link(
            'Primers',array(
                'primer/filter',
                'pGeneId'=>$model->idtbl_gen,
                'pAccessCode'=>$model->codigoaccesion
            )) ?>
    </li>
    <li>
        <?php echo CHtml::link(
            'Relevant Areas',array(
                'areainteres/filter',
                'pGene'=>$model->idtbl_gen,
                'pAccessCode'=>$model->codigoaccesion
            )) ?>
    </li>
</ul>