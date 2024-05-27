<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bank\models\Departments */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="departments-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
