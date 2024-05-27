<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\personal\models\Departments;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\personal\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(); ?>

    <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel<?=$model->id?>"><?=$model->name?></h5>
    </div>
    <div class="modal-body">

        <?php foreach ($model->formsFields as $field){
//                    var_dump(count($fieldList));die();
            switch($field->type){
                case 'text':
                    echo '<div class="col-md-11 mb-3">'.Html::input('text', 'Field['.$field->id.']', '' , ['placeholder'=>$field->name,'class' => 'form-control']).'</div>';
                    break;
                case 'textarea':
                    echo '<div class="col-md-11 mb-3">'.Html::textArea('Field['.$field->id.']', '',['placeholder'=>$field->name,'class' => 'form-control', 'rows'=>4]).'</div>';
                    break;
                case 'data':
                    echo '<div class="col-md-11 mb-3">'.DatePicker::widget([
                            'name' => 'Field['.$field->id.']',
                            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                            'language' => 'ru',
//                                        'disabled'=>true,
                            'value' => $field->name,
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy'
                            ]
                        ]).'</div>';
                    break;
            }
        }?>
        <input type="hidden" value="<?=$user_id?>" name="FormsFieldsData[user_id]">
        <input type="hidden" value="<?=$model->id?>" name="FormsFieldsData[form_id]">
    </div>
    <div class="modal-footer">

        <div class="form-group">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>




