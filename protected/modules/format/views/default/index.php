<?php
    /* @var $this DefaultController */
    /* @var $model Sequence */

    $this->breadcrumbs = array('Format Sequence');
?>

<h2>Format Sequence</h2>

<div class="wide form">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php
        $form = $this->beginWidget(
            'CActiveForm',
            array(
                'id' => 'upload-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true),
                'method'=>'get',
            )
        );
    ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, "Sequence"); ?>
        <?php echo $form->textArea($model, "Sequence"); ?>
        <?php echo $form->error($model, "Sequence");  ?>
    </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'Format'); ?>
            <?php
                echo $form->ListBox($model,'Format', array(
                    'Plain Sequence'=>'Plain Sequence',
                    'FASTA'=>'FASTA',
                ));
            ?>
            <?php echo $form->error($model,'Format'); ?>
	</div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Format Sequence'); ?>
    </div>
    
    <?php $this->endWidget(); ?>
</div>

<h3>Resulting Sequence</h3>

<div class="wide form">
    
<?php
    $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model->format(),
        'attributes'=>array(
            'Format',
            array(
                'label'=>'Sequence',
                'type'=>'raw',
                'value'=>"<textarea id=\"Sequence\" readonly=\"readonly\">" . $model->Sequence ."</textarea>",
                )
            ),
        )
    );
?>
    
</div>