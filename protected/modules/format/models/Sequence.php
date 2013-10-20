<?php

class Sequence extends CModel {
    public $Sequence;
    public $Format;
    
    public function attributeNames()
    {
        return array(
            'Sequence'=>'Sequence',
            'Format'=>'Format'
        );
    }
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function search()
    {
    }
}

?>
