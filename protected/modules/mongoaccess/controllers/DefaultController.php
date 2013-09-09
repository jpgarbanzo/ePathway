<?php
include('CollectionMongo.php');
class DefaultController extends Controller {
    
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';
    
    //List all collections
    public function actionIndex() {
        $model = new MongoModel; 
        $dataProvider=new EMongoDocumentDataProvider('MongoModel', array());
        $collection_names = $model->retrieveCollectionsNames();
        if($collection_names != null) {
            $collection_array = $this->createArrayCollectionObject($collection_names,$model);
            $dataProvider->setData($collection_array);
        }
        $this->render('index', array(
            'dataProvider'=>$dataProvider,
        ));
    }
    
    /**
     * List the collection data
     * @param String $id Collection Name
     */
    public function actionView($id) {
        $model = new MongoModel; 
        $db_instance = MongoModel::model()->getDb();
        $collection = new MongoCollection($db_instance, $id); //ESTE VALOR DEBER PASARSE COMO PARAMETRO
        $model->setCollection($collection);
        $criteria = new EMongoCriteria();
	$dataProvider=new EMongoDocumentDataProvider('MongoModel', array(
            'pagination'=>array('PageSize'=>20),
        ));
        $dataProvider->setCriteria($criteria);
        $results = MongoModel::model()->findAll();
        $columns = $this->createArrayColumns($results);
        foreach ($columns as $column) {
            $data[] = array('name'=> $column);
        }
        $this->render('view', array(
            'dataProvider'=>$dataProvider,
            'data' => $data,
        ));       
    }
   
    public function actionBadImport() {
        $this->render('badimport');
    }
        
    public function actionImport() {
        $model = new CSVFile();
        if (isset($_POST['CSVFile'])) {
            if (file_exists($_FILES['filename']['tmp_name'])) {
                $this->saveFile($_FILES['filename']['tmp_name'], $_POST['species']);
                $this->render('goodimport');    
            }
            else {
                $this->render('badimport');
            }
        }
        else {
            $this->render('import', array('model' => $model,));
        }
    }
        
    /**
     * Save the file into MongoDB
     * @param type $pFile
     * @param type $pCollectionName
     */
    private function saveFile($pFile, $pCollectionName) {
        $db_instance = MongoModel::model()->getDb();
        $collection = new MongoCollection($db_instance, $pCollectionName);
        if (($handle = fopen($pFile, 'r')) !== FALSE) {
            $line_index = 0;
            while (($line_Array = fgetcsv($handle,',')) !== FALSE) {
                for ($index = 0; $index < count($line_Array); $index++) {
                    $data[$line_index][$index] = $line_Array[$index];
                }
                $line_index++;
            }
            fclose($handle);
            $count = count($data) - 1;
            $labels = array_shift($data);
            foreach ($labels as $label) {
                $keys[] = $label;
            }        
            for($j_index = 0; $j_index < count($data); $j_index++) {
                $model = new MongoModel();
                $model->setCollection($collection);
                $model->initSoftAttributes($keys);
                for ($i_index = 0; $i_index < count($keys); $i_index++) {
                     $model->$keys[$i_index] =  $data[$j_index][$i_index];
                }
                $model->save();
            }
        }
    }
    
    /**
     * Create string from array
     * @param ArrayObject $pColumn
     * @return String With all the columns
     */
    private function arrayToString($pColumn) {
        $string = "";
        foreach($pColumn as $column) {
            $string = $string . " " .$column;
        }
        return $string;
    }   
    
    /**
     * Create an array with collection object from all the collections in mongobd
     * @param Array $pCollections
     * @param MongoModel $pModel
     * @return Array With CollectionObject
     */
    private function createArrayCollectionObject($pCollections,$pModel) {
        $db_instance = MongoModel::model()->getDb();
        foreach ($pCollections as $col) {
                $Objeto = new CollectionMongo();
                $Objeto->setCollectionName($col->getName());
                $collection = new MongoCollection($db_instance, $col->getName());
                $pModel->setCollection($collection);
                $results = MongoModel::model()->findAll();
                $columns = $this->createArrayColumns($results);
                $Objeto->setCollectionColumns($this->arrayToString($columns));
                $array[] = $Objeto;
        }
        return $array;
    }
    
    /**
     * Create an array with all the columns in a specific collection
     * @param Array $pResults
     * @return Array With column names
     */
    private function createArrayColumns($pResults) {
        $array_names[] = '';
        foreach($pResults as $result) {
            $columns = $result->getSoftAttributeNames();                   
            foreach ($columns as $column) {
                if(!in_array($column, $array_names))
                    $array_names[] = $column;
            }
        }
        return $array_names;
    }
}

?>