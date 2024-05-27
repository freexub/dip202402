<?php

namespace app\modules\personal\models;

use Yii;

/**
 * This is the model class for table "personal_profile".
 *
 * @property int $user_id Пользователь
 * @property string $full_name Полное имя
 * @property int $iin ИИН
 * @property department_id $department_id Отдел
 * @property string $adderess Адрес
 * @property string $date_create Дата создания
 * @property string|null $date_update Последняя дата редактирования
 * @property int $active Статус
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'full_name', 'iin', 'adderess'], 'required'],
            [['user_id', 'iin', 'active', 'department_id'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['full_name'], 'string', 'max' => 250],
            [['adderess'], 'string', 'max' => 500],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID сотрудника',
            'full_name' => 'Полное имя',
            'iin' => 'Ключ доступа',
            'department_id' => 'Отдел',
            'adderess' => 'Адрес',
            'date_create' => 'Дата регистрации',
            'date_update' => 'Дата редактирования',
            'active' => 'Статус',
        ];
    }

    public function getAllForms()
    {
        return Forms::find()->where(['active'=>0])->all();
    }

    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }

    public function getChart()
    {
        return $this->hasOne(Chart::className(), ['id' => 'user_id']);
    }

    public function getStatus()
    {
        $today = date('Y-d-m');
        $model = Chart::find()->where(['user_id'=>$this->user_id])->andWhere(['>=','date',$today])->all();
        if (count($model)>0)
            $status = '<span class="btn btn-success disabled">На работе</span>';
        else
            $status = '<span class="btn btn-danger disabled">Отсутствует</span>';

        return $status;
    }
}
