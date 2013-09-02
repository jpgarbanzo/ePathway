<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MongoModel
 *
 * @author ofernandez
 */
class MongoModel extends EMongoSoftDocument {
     
    public $CollectionsNames;
    
    public function getCollectionName()
    {
        return 'ecollection';
    }
 
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }    
    
    public function retrieveCollectionsNames(){
        $db = $this->getDb();
        $result = $db->listCollections();
        if ($result == false)
            return null;
        else {
            return $result;
        }
    }
    
    
}

?>

