<?php

class DefaultController extends Controller
{
    public $layout='//layouts/column2';
    
    public function actionIndex()
    {
        $model = new MongoModel;
        $collection_names = $model->retrieveCollectionsNames();
        
        
        
        $model->CollectionsNames = $this->split($collection_names);
        $criteria = new EMongoCriteria();
        //$criteria->ID = 'At5g14950';
	$dataProvider=new EMongoDocumentDataProvider('MongoModel', array());
        $dataProvider->setCriteria($criteria);
            $this->render('index', array(
                
                'model'=>$model,
            'collection_names'=>$collection_names,
                'dataProvider'=>$dataProvider
            ));       
    }
    
    
 /*   public function actionIndex() {
        $model = new MongoModel;
          
        $collection_names = $model->retrieveCollectionsNames();
        $model->CollectionsNames = $collection_names;
        $criteria = new EMongoCriteria();
        //$criteria->ID = 'At5g14950';
	$dataProvider=new EMongoDocumentDataProvider('MongoModel', array());
        $dataProvider->setCriteria($criteria);
        $this->render('index',array(
            'model'=>$model,
            'collection_names'=>$collection_names,
		));
    }
  * 
  */
    
      public function actionBadImport()
    {
        $this->render('badimport');
    }
    
     public function actionImport()
    {
        $model = new CSVFile();
        
        if (isset($_POST['CSVFile']))
        {            
            if (file_exists($_FILES['filename']['tmp_name'])) {
                $this->saveFile($_FILES['filename']['tmp_name'], $_POST['species']);
                $this->render('goodimport');
                
            } else {
                $this->render('badimport');
            }
        }
        else {
            $this->render('import', array(
                'model' => $model,
            ));
        }
    }
    
    public function saveFile($pFile, $pCollectionName)
    {
        $db_instance = MongoModel::model()->getDb();
        $collection = new MongoCollection($db_instance, $pCollectionName);
                
        if (($handle = fopen($pFile, 'r')) !== FALSE) {
            $i = 0;
            
            while (($lineArray = fgetcsv($handle,',')) !== FALSE) {
                for ($j = 0; $j < count($lineArray); $j++) {
                    $data[$i][$j] = $lineArray[$j];
                }
            
                $i++;
            }
            fclose($handle);
        }
        $count = count($data) - 1;
        
        $labels = array_shift($data);
 
        foreach ($labels as $label) {
            $keys[] = $label;
        }        
        $ii = 0;
        $jj = 0;
        
        for($jj = 0; $jj < count($data); $jj++)
        {
            $model = new MongoModel();
            $model->setCollection($collection);
            $model->initSoftAttributes($keys); //Ingresa la llave como valor
            
            for ($ii = 0; $ii < count($keys); $ii++) {
                 $model->$keys[$ii] =  $data[$jj][$ii];
            }
            $model->save();
        }
    }
    
    
    
    private function split($pCollection) {
        foreach($pCollection as $collection)
        {
            $collection_name = explode(".", $collection);
            $names[] = $collection_name[1];
        }
        return $names;
    }
    
    
    
}

?>