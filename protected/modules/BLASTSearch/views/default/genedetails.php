<?php
/* 
 * @var $this DefaultController
 */
$this->menu=array(
        array('label'=>'BLAST index', 'url'=>array('index')),
        array('label'=>'BLAST search', 'url'=>array('blastsearch'))
    );

$this->breadcrumbs=array(
	'Gene Details'
);
?>

<h1>Details for gene <?php echo $access_code ?> </h1>

<?php
$this->renderPartial('_genedetails',array('gene_details'=>$gene_details));

echo '<br/>';
echo '';

?>


<br/>
<ul class="big-menu">
    <li><a target="blank" href= <?php echo '"'. EBIGeneDetails::$NCBI_GENE_DETAILS_URL . $access_code . '"' ?> >Check on NCBI</a></li>
    <li><a target="blank" href= <?php echo '"'. EBIGeneDetails::$EBI_GENE_DETAILS_URL . $access_code . '"' ?> >Check on NCBI</a></li>
</ul>
