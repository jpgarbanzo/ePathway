<?php

class Sequence extends CModel {
    public $Sequence;
    
    public function attributeNames()
    {
        return array(
            'CompoundId'=>'Sequence',
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
