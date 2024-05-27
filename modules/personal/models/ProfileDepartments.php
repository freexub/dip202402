<?php

namespace app\modules\personal\models;

use Yii;

/**
 * This is the model class for table "personal_profile_departments".
 *
 * @property int $id Номер
 * @property int $user_id Сотрудник
 * @property int $department_id Отдел
 * @property string $date_create Дата назначения
 * @property string|null $date_update Дата изменения
 * @property int $active Статус
 *
 * @property Profile $user
 * @property Departments $department
 */
class ProfileDepartments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal_profile_departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'department_id'], 'required'],
            [['user_id', 'department_id', 'active'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'department_id' => 'Department ID',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }
}
