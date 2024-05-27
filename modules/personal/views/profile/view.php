<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use Da\QrCode\QrCode;

/* @var $this yii\web\View */
/* @var $model app\modules\bank\models\Profile */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Modals -->
<?php foreach ($model->allForms as $form):?>
    <div class="modal fade" id="addModal<?=$form->id?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel<?=$form->id?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?= $this->render('_form-add', [
                    'model' => $form,
                    'user_id' => $model->user_id,
                ]) ?>
            </div>
        </div>
    </div>
<?php endforeach;?>

<div class="profile-view">

    <div class="card card-outline card-success">
        <div class="card-header">
            <div class="card-tools">
            <?= Html::a('Редактировать', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->user_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы хотите удалить сотрудника?',
                    'method' => 'post',
                ],
            ]) ?>
            </div>
        </div>

        <div class="card-footer">

            <div class="row">
                <div class="col-2">
                    <div class="info-box">
                        <div class="info-box-content">
                            <img src="/qr/<?=md5($_GET['id'])?>.png">
                        </div>

                    </div>
                </div>
                <div class="col-10">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'user_id',
                            'full_name',
//                            'iin',
                            'adderess',
                            'date_create',
//                            'date_update',
//                            'active',
//                            'department.name',
                            [
                                'label' => 'Отдел',
                                'value' => function($data){
                                    return $data->department->name;
                                },
                            ],
                        ],
                    ]) ?>
                </div>
            </div>


        </div>
        <div class="card-body">

            <div class="btn-group mb-3">
                <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    Добавить запись
                </button>
                <div class="dropdown-menu">
                    <?php foreach ($model->allForms as $form):?>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addModal<?=$form->id?>"><?=$form->name?></a>
                    <?php endforeach;?>
                </div>
            </div>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//              'filterModel' => $searchModel,
//                'showHeader' => false,
                'summary' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'format' => 'raw',
                        'label' => 'Информация',
                        'options' => ['width' => '80%'],
                        'value' => function($data){
//                            var_dump((array)json_decode($data->content));die;
                            return $data->contentData;
                        }
                    ],
                    [
                        'format' => 'raw',
                        'label' => 'Автор',
                        'options' => ['width' => '15%'],
                        'value' => function($data){
                            return $data->personal->full_name;
                        }
                    ],
//                    [
//                        'format' => 'raw',
//                        'label' => 'Тип записи',
//                        'options' => ['width' => '15%'],
//                        'value' => function($data){
//                            return $data->forms->name;
//                        }
//                    ],
                ],
            ]); ?>
        </div>

    </div>

</div>
