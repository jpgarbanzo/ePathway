<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);

$this->menu=array(
        array('label'=>'BLAST search', 'url'=>array('blastsearch')),
        array('label'=>'Check Jobs', 'url'=>array('index'))
    );

?>
<h1>EBI Powered BLAST Search</h1>

<p>
With this tool, you can perform BLAST searches, using the same databases provided by EBI, and also see the information of a gene, using its accession code.
</p>


<?php
    $url = array('AutomaticBLAST');
    echo CHtml::link(
        'AutomaticBLAST!',
        $url,
        array(
                'submit' => $url,
                'params' => array('Sequence' => 'AATCGATCGATGCTAGCTAGCTGACCACACACTGTTGCTGATCGATCGTAGCTAGCTGTGTGTACTACACCACACTGACTATCG'),
        )
    );
?>