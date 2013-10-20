<?php
    /* @var $this DefaultController */
    /* @var $model Sequence */

    $this->breadcrumbs = array('Format Sequence');
?>

<h2>Format Sequence</h2>

<div class="form">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php
        $form = $this->beginWidget(
            'CActiveForm',
            array(
                'id' => 'upload-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true),
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )
        );
    ?>
</div>