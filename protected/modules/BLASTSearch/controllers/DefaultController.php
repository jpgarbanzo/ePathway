<?php

class DefaultController extends Controller
{
    public $layout='//layouts/column2';
    
	public function actionIndex()
	{
		$this->render('index');
	}
        
        /**
         * Render the form used to request a BLAST search, using the fields 
         * in the model BlastGene
         */
        public function actionBLASTSearch()
        {
            $model = new BLASTGene();
            
            if(isset($_POST['blast-search-form'])){
			$model->attributes = $_POST['blast-search-form'];
                        if($model->validate()){
                            $this->redirect('index');
                        }
                        
			//if($model->save())
			//	$this->redirect(array('view','id'=>$model->idtbl_gen));
            }
            
            
            $this->render('blastsearch', array('model'=>$model));
        }
        
        
        public function actionViewJob($pJobId){
            $model = new BLASTGene();
            
            $job_status = $model->getJobStatus($pJobId);
            
            $this->render('viewjob', array(
                'model' => $model,
                'job_status' => $job_status,
            ));
            
        }
        
        
        /**
	 * Performs the AJAX validation.
	 * @param Gen $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gen-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}