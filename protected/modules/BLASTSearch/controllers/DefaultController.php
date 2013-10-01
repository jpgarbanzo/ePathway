<?php

class DefaultController extends Controller {

    public $layout = '//layouts/column2';

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Render the form used to request a BLAST search, using the fields 
     * in the model BlastGene
     */
    public function actionBLASTSearch() {
        $model = new BLASTGene();

        if (isset($_POST['BLASTGene'])) {
            $model->attributes = $_POST['BLASTGene'];
            if ($model->validate()) {
                $blast_job_result = $model->requestBLASTSearch($model, BLASTGene::$REQUEST_TYPE_XML);
                $this->redirect($this->createUrl('ViewJob', array('pJobId' => $blast_job_result)));
            } else {
                $this->redirect('index');
            }

            //if($model->save())
            //	$this->redirect(array('view','id'=>$model->idtbl_gen));
        }


        $this->render('blastsearch', array('model' => $model));
    }

    public function actionViewJob($pJobId) {
        $model = new BLASTGene();

        $job_status = $model->getJobStatus($pJobId);

        if ($job_status === BLASTGene::$JOB_STATUS_FINISHED) {
            $job_xml_result = $model->getXMLJobResult($pJobId);
            $BLASTResult_items = BLASTResultItem::getInstance()->getBLASTResultItemFromXMLRawResult($job_xml_result);
            
            $blast_data_provider = new CArrayDataProvider('BLASTResultItems', array(
                'data' => $BLASTResult_items,
                'id' => 'blast-search-result',
                'keyField' => 'ID',
                'pagination' => array(
                    'pageSize' => 10,
                ),
                    )
            );
        }else{
            $blast_data_provider = null;
        }



        $this->render('viewjob', array(
            'model' => $model,
            'job_status' => $job_status,
            'job_id' => $pJobId,
            'result_columns' => BLASTResultItem::getInstance()->getAttributes(),
            //'job_result' => $job_xml_result,
            'blast_data_provider' => $blast_data_provider,
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param Gen $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'gen-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}