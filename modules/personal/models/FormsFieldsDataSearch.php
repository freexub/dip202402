<?php

namespace app\modules\personal\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\personal\models\FormsFieldsData;

/**
 * FormsFieldsDataSearch represents the model behind the search form of `app\modules\personal\models\FormsFieldsData`.
 */
class FormsFieldsDataSearch extends FormsFieldsData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'form_id', 'user_id', 'active'], 'integer'],
            [['content', 'date_create'], 'safe'],
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
        $query = FormsFieldsData::find();

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
            'form_id' => $this->form_id,
            'user_id' => $this->user_id,
            'date_create' => $this->date_create,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
