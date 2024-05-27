<?php

namespace app\modules\personal\models;

use Yii;

/**
 * This is the model class for table "personal_chart".
 *
 * @property int $id Номер
 * @property int $user_id сотрудник
 * @property int $termenal_id Терминал
 * @property string $date Дата
 * @property int $type Тип
 */
class Chart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal_chart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'termenal_id', 'type'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'user_id' => 'Сотрудник',
            'termenal_id' => 'Терминал',
            'date' => 'Дата',
            'type' => 'Тип',
        ];
    }
}
