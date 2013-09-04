<?php

/**
 * This is the model class for MongoDB.
 */
class MongoModel extends EMongoSoftDocument {
     
    //used to pass the collection names to some views
    //public $CollectionsNames;
    //public $collection_name;
        
    /**
     * @return string the default database collection name
     */
    public function getCollectionName() {
        return 'ecollection';
    }
 
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MongoModel the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }    
    
    /**
     * Return an array of all the collections that exist in the database
     * @return ArrayObject The available database collections
     */
    public function retrieveCollectionsNames(){
        $db_instance = $this->getDb();
        $result = $db_instance->listCollections();
        if ($result == false)
            return null;
        else {
            return $result;
        }
    }
}

?>

