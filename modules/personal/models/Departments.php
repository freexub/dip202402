<?php

namespace app\modules\personal\models;

use Yii;

/**
 * This is the model class for table "personal_departments".
 *
 * @property int $id Номер отдела
 * @property string $name Название отдела
 *
 * @property PersonalProfileDepartments[] $personalProfileDepartments
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal_departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер отдела',
            'name' => 'Отдел',
        ];
    }

    /**
     * Gets query for [[BankProfileDepartments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankProfileDepartments()
    {
        return $this->hasMany(ProfileDepartments::className(), ['department_id' => 'id']);
    }
}
