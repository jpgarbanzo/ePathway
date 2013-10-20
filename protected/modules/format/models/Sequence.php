<?php

class Sequence extends CModel
{
    // <editor-fold defaultstate="collapsed" desc="Properties">
    
    public $Sequence;
    public $Format;
    public $Description;
    
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Yii related methods">
    
    public function attributeNames()
    {
        return array(
            'Sequence'=>'Sequence',
            'Format'=>'Format',
            'Comment'=>'Description',
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
        
        $lines = preg_split("/\n/", $pModel->Sequence);
        array_shift($lines);
        $sequence = implode("", $lines);
        $new_sequence = preg_replace("/\s*/", "", $sequence);
        
        $model->Sequence = '<textarea id="sequence" class="dna" readonly="readonly">' . $new_sequence . '</textarea>';
        return $model;
    }
}

?>
