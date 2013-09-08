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
        $collection_names = $model->retrieveCollectionsNames();
        $db_instance = MongoModel::model()->getDb();
        $dataProvider=new EMongoDocumentDataProvider('MongoModel', array());
        
        //En caso de que no exista ninguna coleccion en la base de datos
        if($collection_names != null) {
            //Por cada coleccion que exista 
            foreach ($collection_names as $col) {
                $Objeto = new CollectionMongo();
                $Objeto->setCollectionName($col->getName());
                $collection = new MongoCollection($db_instance, $col->getName());
                $model->setCollection($collection);
                $results = MongoModel::model()->findAll();
                $string[];
                foreach($results as $result)
                {
                    $columns = $result->getSoftAttributeNames();
                    print_r($columns);
                    //Por cada columna en el grupo de columnas
                    
                    
                    foreach ($columns as $column) {
                        if(!in_array($column, $string))
                            $string[] = $column;
                    }
                    
                }
                $Objeto->setCollectionColumns(arrayToString($string));
                $array[] = $Objeto;
            }
            $dataProvider->setData($array);
       }
//        $this->render('index', array(
//           'dataProvider'=>$dataProvider,
//        ));
    }
    
    //List collection data
    public function actionView($id) {
        $model = new MongoModel; 
        $db_instance = MongoModel::model()->getDb();
        $collection = new MongoCollection($db_instance, $id); //ESTE VALOR DEBER PASARSE COMO PARAMETRO
        $model->setCollection($collection);
        $criteria = new EMongoCriteria();
	$dataProvider=new EMongoDocumentDataProvider('MongoModel', array(
            'criteria'=>$criteria,
            'pagination'=>array('PageSize'=>10),
        ));
        $dataProvider->setCriteria($criteria);
        $attributes = MongoModel::model()->find();
        $columns = $attributes->getSoftAttributeNames();
        foreach ($columns as $column) {
            $data[] = array('name'=> $column);
        }
        $this->render('view', array(
            'model'=>$model,
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
     * Split the collection names
     * @param ArrayObject $pCollection
     * @return ArrayObject Only the collection names
     */
    private function arrayToString($pColumn) {
        $string = "";
        foreach($pColumn as $column) {
            $string = $string . $column;
        }
        return $string;
    }
    
    
}

?>