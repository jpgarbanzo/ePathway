<?php

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
        $pathway = $this->getPathway($id);
        $this->render('view', array(
            'pathway' => $pathway,
        ));
    }
}

?>
