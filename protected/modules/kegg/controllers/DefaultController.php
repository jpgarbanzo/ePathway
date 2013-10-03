<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

class DefaultController extends Controller 
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';
    
    public function actionIndex() {
        $model = new KEGGCompound;
        
        $this->render('index', array(
            'model'=>$model,
        ));
    }
    
    public function actionView($id) {
        $model = new KEGGCompound;
        
        $pathway = $model->getPathway($id);
        $this->render('view', array(
            'pathway' => $pathway,
        ));
    }
}

?>
