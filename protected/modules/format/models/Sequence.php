<?php

class Sequence extends CModel
{
    // <editor-fold defaultstate="collapsed" desc="Properties">
    
    public $Sequence;
    public $Format;
    
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Yii related methods">
    
    public function attributeNames()
    {
        return array(
            'Sequence'=>'Sequence',
            'Format'=>'Format'
        );
    }

    public function rules()
    {
        return array (
            array('Sequence, Format', 'required'),
        );          
    }
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    // </editor-fold>
    
    public function format()
    {
        $model = new Sequence;
        
        if (isset($_GET['Sequence'])) {
            $model->attributes = $_GET['Sequence'];

            if ($model->Format == "FASTA") {
                $model = $this->formatFASTA($model);
            } else {
                $model = $this->formatPlain($model);
            }
        }
        
        return $model;
    }
    
    private function formatFASTA($pModel)
    {
        $model = new Sequence;
        $model->Format = $pModel->Format;
        return $model;
    }
    
    private function formatPlain($pModel)
    {
        $model = new Sequence;
        $model->Format = $pModel->Format;
        return $model;
    }
}

?>
