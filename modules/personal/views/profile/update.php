<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bank\models\Profile */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->full_name, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="profile-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
