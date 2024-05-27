<?php

namespace app\modules\personal\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\personal\models\ProfileDepartments;

/**
 * ProfileDepartmentssSearch represents the model behind the search form of `app\modules\personal\models\ProfileDepartments`.
 */
class ProfileDepartmentssSearch extends ProfileDepartments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'department_id', 'active'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProfileDepartments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'department_id' => $this->department_id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'active' => $this->active,
        ]);

        return $dataProvider;
    }
}
