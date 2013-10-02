<?php

class DefaultController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';
    
    
    //Call the error page
    public function actionBadSequence() {
        $this->render('badsequence');
    }

    
    //Show the form, and calls the view with the results obtained
    public function actionIndex() {
        $model = new Prosite();
        if(isset($_POST['Prosite'])) {
            $model->sequence = $_POST['Prosite']['sequence'];
            $json = $model->accessToProsite($_POST['Prosite']['sequence']);
            if($json == []) {
                $this->render('badsequence');
            }
            else {
                $dataProvider=new CArrayDataProvider($model, array());
                $dataProvider->setData($json);
                $this->render('view',array(
                    'model' =>$model,
                    'dataProvider'=>$dataProvider,
                ));
            }
        }
        else {
        $this->render('index',array(
            'model' => $model,
            ));
        }        
    }
}
?>