<?php

error_reporting(E_ALL);
ini_set('display_errors', True);

class CSVFile extends CModel
{
    public $filepath;
    public $species;
 
    public function rules()
    {
        return array (
            array('filepath', 'file',
                'types' => 'csv', 
                'allowEmpty' => true, 
                'wrongType'=>'Only csv allowed.', 
                'tooLarge'=>'File too large! 10MB is the limit'),
            array('species', 'required'),
            array('filepath', 'required'),
        );
                
    }
    
    public function attributeNames()
    {
        return array(
            'filepath'=>'FilePath',
            'species'=>'Species Name',
            );
    }
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}

?>
