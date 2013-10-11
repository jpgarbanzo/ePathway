<?php
/* 
 * @var $this DefaultController
 * @var $gene_details
 */

$this->widget('zii.widgets.CDetailView', array(
    'data'=>$gene_details,
    'attributes'=>array(
        'Keyword',
        'Title',
        'Author',
        'OrganismLink:html',
        'TaxonLineageLinks:html',
        'CDS',
        array(
            'label' => 'Sequence',
            'type' => 'raw',
            'value' => '<textarea readonly="readonly" class="dna" id="sequence">' . $gene_details->Sequence . '</textarea>'
        ),
    ),
));



?>