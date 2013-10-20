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
            'Description'=>'Description',
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
        
        if (isset($_POST['Sequence'])) {
            $model->attributes = $_POST['Sequence'];

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
        $description = "";
        $line_lenght = 50;
        Yii::log(print_r($pModel, true), 'info', 'System.web');
        if (isset($pModel->Description)) {
            $description = ">" . $pModel->Description;
            $line_lenght = len($description);
        } else {
            srand(floor(time() / (60*60*24)));
            $description = ">sequence_" . rand();
        }
        
        $sequence = chunk_split($pModel->Sequence, 50, "\n");
        $lines = explode("\n", $sequence);
        array_unshift($lines, $description);
        $new_sequence = implode("\n", $lines);
        $model->Sequence = '<textarea id="sequence" class="dna" readonly="readonly">' . $new_sequence . '</textarea>';
        
        return $model;
    }
    
    private function formatPlain($pModel)
    {
        $model = new Sequence;
        $model->Format = $pModel->Format;
        
        $lines = preg_split("/\n/", $pModel->Sequence);
        if (strpos($lines[0], ">") !== false ||
            (strpos($lines[0], ";")) !== false) {
            array_shift($lines);
        }
        $sequence = implode("", $lines);
        $new_sequence = preg_replace("/\s*/", "", $sequence);
        
        $model->Sequence = '<textarea id="sequence" class="dna" readonly="readonly">' . $new_sequence . '</textarea>';
        return $model;
    }
    
    private static $ALLOWED_LETTERS = "ACGTURYKMSWBDHVNX";
}

?>
