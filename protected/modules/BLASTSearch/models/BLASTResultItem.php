<?php

/**
 * This class is used as a model entity for storing a BLAST search result
 */
class BLASTResultItem extends CModel {

    // <editor-fold defaultstate="collapsed" desc="Properties">
    //Main attributes returned from EBI search
    public $Database;
    public $ID;
    public $AC;
    public $Length;
    public $Description;
    
    //Nested Attributes, correponding to the "alignments" section of the result
    public $Score;
    public $Expectation;
    public $Identity;
    public $Gaps;
    public $Strand;
    public $Bits;
    public $QuerySeq;
    public $Pattern;
    public $MatchSeq;
    
    public $id;
    
    // </editor-fold>

    public function attributeNames() {
        array(
            'Database' => 'Database',
            'ID' => 'ID',
            'AC' => 'AC',
            'Length' => 'Length',
            'Description' => 'Description',
            'Score' => 'Score',
            'Expectation' => 'Expectation',
            'Identity' => 'Identity',
            'Gaps' => 'Gaps',
            'Strand' => 'Strand',
            'Bits' => 'Bits',
            'QuerySeq' => 'QuerySeq',
            'Pattern' => 'Pattern',
            'MatchSeq' => 'MatchSeq',
        );
    }
    
    public function getAttributes(){
        return array(
            'Database',
            'ID',
            'AC',
            'Length',
            'Description',
            'Score',
            'Expectation',
            'Identity',
            'Gaps',
            'Strand',
            'Bits',
            'QuerySeq',
            'Pattern',
            'MatchSeq',
        );
        
        
    }

    /**
     * Converts a raw SimpleXmlObject to an Array containing BLASTResultItems
     * one, for each result
     * @param SimpleXmlObject $pXmlResult
     * @return array \BLASTResultItem
     */
    public function getBLASTResultItemFromXMLRawResult($pXmlResult) {
        foreach ($pXmlResult->SequenceSimilaritySearchResult->hits->children() as $hit){
            
            foreach($hit->children()->children() as $alignment){
                $blast_result_item = new BLASTResultItem();
                
                //basic attributes set
                $blast_result_item->Database = (string)$hit->attributes()->{'database'};
                $blast_result_item->ID = (string)$hit->attributes()->{'id'};
                $blast_result_item->AC = (string)$hit->attributes()->{'ac'};
                $blast_result_item->Length = (string)$hit->attributes()->{'length'};
                $blast_result_item->Description = (string)$hit->attributes()->{'length'};
                
                //alignment attributes set
                $blast_result_item->Score = (string)$alignment->score;//->attributes()->{'score'};
                $blast_result_item->Expectation = (string)$alignment->expectation; //attributes()->{'expectation'};
                $blast_result_item->Identity = (string)$alignment->identity; //attributes()->{'identity'};
                $blast_result_item->Gaps = (string)$alignment->gaps; //attributes()->{'gaps'};
                $blast_result_item->Strand = (string)$alignment->strand; //attributes()->{'strand'};
                $blast_result_item->Bits = (string)$alignment->bits;
                $blast_result_item->QuerySeq = (string)$alignment->querySeq; //attributes()->{'querySeq'};
                $blast_result_item->Pattern = (string)$alignment->pattern; //attributes()->{'pattern'};
                $blast_result_item->MatchSeq = (string)$alignment->matchSeq; //attributes()->{'matchSeq'};
                
                $result[] = $blast_result_item;
            }
        }
        return $result;
    }
}

?>
