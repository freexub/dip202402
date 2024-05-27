<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Формы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forms-index">
    <div class="card card-outline card-success">
        <div class="card-header">
            <?= Html::a('Создать новую форму', ['create'], ['class' => 'btn btn-success']) ?>

        </div>

        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'name',
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'value' => function($data){
                            return Html::a($data->name, ['history','id'=>$data->id]);
                        }
                    ],
//            'active',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>

    </div>


</div>
