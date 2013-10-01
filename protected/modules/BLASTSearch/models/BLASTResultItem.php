<?php

/**
 * This class is used as a model entity for storing a BLAST search result
 */
class BLASTResultItem extends CModel {

    // <editor-fold defaultstate="collapsed" desc="Properties">
    public $Database;
    public $ID;
    public $AC;
    public $Length;
    public $Description;

    // </editor-fold>

    /**
     * Constructor to get a new instance with all the attributes returned from a search
     * @param type $pDatabase
     * @param type $pId
     * @param type $pAc
     * @param type $pLength
     * @param type $pDescription
     */
    public function __construct($pDatabase, $pId, $pAc, $pLength, $pDescription) {
        $this->Database = $pDatabase;
        $this->ID = $pId;
        $this->AC = $pAc;
        $this->Length = $pLength;
        $this->Description = $pDescription;
    }

    public function attributeNames() {
        array(
            'Database' => 'Database',
            'ID' => 'ID',
            'AC' => 'AC',
            'Length' => 'Length',
            'Description' => 'Description',
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
            
            foreach($hit->children() as $data){
                $result[] = new BLASTResultItem(
                                $hit->attributes()->{'database'}, 
                                $hit->attributes()->{'id'}, 
                                $hit->attributes()->{'ac'}, 
                                $hit->attributes()->{'length'}, 
                                $hit->attributes()->{'description'}
                                );
            }
        }
        return $result;
    }

}

?>
