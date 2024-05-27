<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormsFieldsData */

$this->title = 'Create Forms Fields Data';
$this->params['breadcrumbs'][] = ['label' => 'Forms Fields Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forms-fields-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
