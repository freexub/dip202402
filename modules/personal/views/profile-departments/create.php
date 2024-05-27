<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bank\models\ProfileDepartments */

$this->title = 'Create Profile Departments';
$this->params['breadcrumbs'][] = ['label' => 'Profile Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-departments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
