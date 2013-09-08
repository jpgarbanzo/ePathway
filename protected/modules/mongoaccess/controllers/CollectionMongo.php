<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CollectionMongo
 *
 */
class CollectionMongo {
    private $CollectionName;
    private $CollectionColumns;
    public $_id;


    public function getCollectionName() {
        return $this->CollectionName;
    }

    public function setCollectionName($pCollectionName) {
        $this->CollectionName = $pCollectionName;
    }

    public function getCollectionColumns() {
        return $this->CollectionColumns;
    }

    public function setCollectionColumns($pCollectionColumns) {
        $this->CollectionColumns = $pCollectionColumns;
    }
}

?>
