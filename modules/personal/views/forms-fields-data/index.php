<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormsFieldsDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация по записям';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forms-fields-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Forms Fields Data', ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'form_id',
            [
                'attribute' => 'form_id',
                'value' => function($data){
                    return $data->forms->name;
                },
                'filter' => \yii\bootstrap4\Html::dropDownList(\yii\helpers\ArrayHelper::map($this->getAllForms(),'id','name'))
            ],
            'user_id',
//            'content:ntext',
            'date_create',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
