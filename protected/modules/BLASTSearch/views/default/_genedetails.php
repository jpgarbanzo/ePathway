<?php
/* 
 * @var $this DefaultController
 * @var $gene_details
 */

//echo $gene_details;

//foreach ($raw->children() as $child){
  
$child = $raw->children()->entry;

    print_r($child->keyword);
    echo '<br/><br/>';
    print_r($child->reference);
    echo '<br/><br/>';
    print_r($child->feature);
    echo '<br/><br/>';
    print_r($child->sequence);
    echo '<br/><br/>';
//}

echo '<br/><br/>';

//print_r($raw);

echo '<br/><br/>';

echo 'Keyword:' . $gene_details->Keyword . '<br/>';
//echo '$Reference:' . $gene_details->Reference . '<br/>';


echo 'Title:' . $gene_details->Title . '<br/>';
echo 'Author:' . $gene_details->Author . '<br/>';

echo 'Organism: ' . $gene_details->OrganismLink . '<br/>';

echo 'TaxonLineage: ' . $gene_details->TaxonLineageLinks . '<br/>';


//echo '$Feature:' . $gene_details->Feature . '<br/>';
//print_r($gene_details->Feature);
echo '<br/><br/>';
echo '$Sequence:' . $gene_details->Sequence . '<br/>';



$this->widget('zii.widgets.CDetailView', array(
    'data'=>$gene_details,
    'attributes'=>array(
        'Keyword',
        'Title',
        'Author',
        'OrganismLink:html',
        'TaxonLineageLinks:html',
        
        array(
            'label' => 'Sequence',
            'type' => 'raw',
            'value' => '<textarea readonly="readonly" class="dna" id="sequence">' . $gene_details->Sequence . '</textarea>'
        ),
    ),
));



?>