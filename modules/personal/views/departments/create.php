<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bank\models\Departments */

$this->title = 'Добавление отдела';
$this->params['breadcrumbs'][] = ['label' => 'отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
