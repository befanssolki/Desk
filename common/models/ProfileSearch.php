<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `common\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_profile', 'tel'], 'integer'],
            [['name_profile', 'familia_profile', 'otchestvo_profile', 'datereg'], 'safe'],
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
        $query = Profile::find();

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
            'id_profile' => $this->id_profile,
            'tel' => $this->tel,
            'datereg' => $this->datereg,
        ]);

        $query->andFilterWhere(['ilike', 'name_profile', $this->name_profile])
            ->andFilterWhere(['ilike', 'familia_profile', $this->familia_profile])
            ->andFilterWhere(['ilike', 'otchestvo_profile', $this->otchestvo_profile]);

        return $dataProvider;
    }
}
