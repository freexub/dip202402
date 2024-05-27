<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\personal\models\Departments;

/* @var $this yii\web\View */
/* @var $model app\modules\personal\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Заполните поля в форме</h3>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'user_id')->textInput() ?>

            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'iin')->textInput() ?>

            <?= $form->field($model, 'adderess')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'department_id')->dropDownList(ArrayHelper::map(Departments::find()->all(),'id','name'),[
                'prompt' => 'Отдел не назначен ...'
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>


</div>
