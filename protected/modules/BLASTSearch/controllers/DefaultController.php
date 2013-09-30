<?php

class DefaultController extends Controller
{
    public $layout='//layouts/column2';
    
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionSearch()
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
            
            
            $this->render('search', array('model'=>$model));
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