<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bank\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Укажите название отдела</h3>
        </div>

        <div class="card-body"><?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>


</div>
