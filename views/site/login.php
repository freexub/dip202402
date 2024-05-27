<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="card card-info">
        <div class="card-body">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
            <div class="row">
                <div class="col-lg-5">

                    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                            'inputOptions' => ['class' => 'col-lg-3 form-control'],
                            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Логин','autofocus' => true])->label(false) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>
                </div>

                <div class="col-lg-5">

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ])->label('Оставаться в системе') ?>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div>
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
    </div>

</div>
