<?php

class DefaultController extends Controller {

    public $layout = '//layouts/column2';
    
    // <editor-fold defaultstate="collapsed" desc="Framework related functions">
        /**
         * @return array action filters
         */
        public function filters()
        {
                return array(
                        'accessControl', // perform access control for CRUD operations
                );
        }
        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules()
        {
                return array(
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
                                'actions'=>array('index','BLASTSearch','ViewGeneDetails','ViewJob'),
                                'users'=>array('@'),
                        ),
                        array('deny',  // deny all users
                                'users'=>array('*'),
                        ),
                );
        }
    // </editor-fold>




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
                $blast_job_result = $model->requestBLASTSearch($model);
                $this->redirect($this->createUrl('ViewJob', array('pJobId' => $blast_job_result)));
            }
        }
        $this->render('blastsearch', array('model' => $model));
    }

    public function actionViewJob($pJobId) {
        $model = new BLASTGene();

        $job_status = $model->getJobStatus($pJobId);

        if ($job_status === BLASTGene::$JOB_STATUS_FINISHED) {
            //$job_image_result = $model->getPNGJobResult($pJobId);
            $job_xml_result = $model->getXMLJobResult($pJobId);
            $BLASTResult_items = BLASTResultItem::getInstance()->getBLASTResultItemFromXMLRawResult($job_xml_result);
            
            $blast_data_provider = new CArrayDataProvider('BLASTResultItems', array(
                'data' => $BLASTResult_items,
                'id' => 'blast-search-result',
                'keyField' => 'ID',
                'pagination' => array(
                    'pageSize' => 10,
                ),
                //'sort'=>array(
                //    'attributes'=> BLASTResultItem::getInstance()->getAttributes()),
            ));
        }else{
            $blast_data_provider = null;
            $BLASTResult_items = null;
        }
        
        $this->render('viewjob', array(
            'model' => $model,
            'job_status' => $job_status,
            'job_id' => $pJobId,
            'result_columns' => BLASTResultItem::getInstance()->getAttributes(),
            'blast_result_items' => $BLASTResult_items,
            //'job_image_result' => $job_image_result,
            'blast_data_provider' => $blast_data_provider,
        ));
    }
    
    
    public function actionViewGeneDetails($pGeneAccessCode){
        $gene_details = EBIGeneDetails::getInstance()->getEBIGeneDetails($pGeneAccessCode);
        //$gene_details = EBIGeneDetails::getInstance()->getEBIGeneDetailsFromSimpleXMLElement($raw_gene_details);
        
        
        $this->render('genedetails', array(
                'gene_details' => $gene_details,
                'access_code' => $pGeneAccessCode,
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