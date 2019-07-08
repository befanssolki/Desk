<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Doska;

/**
 * DoskaSearch represents the model behind the search form of `common\models\Doska`.
 */
class DoskaSearch extends Doska
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_doska', 'id_profile'], 'integer'],
            [['header', 'category', 'price', 'photo', 'date_pub', 'about'], 'safe'],
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
        $query = Doska::find();

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
            'id_doska' => $this->id_doska,
            'id_profile' => $this->id_profile,
            'date_pub' => $this->date_pub,
        ]);

        $query->andFilterWhere(['ilike', 'header', $this->header])
            ->andFilterWhere(['ilike', 'category', $this->category])
            ->andFilterWhere(['ilike', 'price', $this->price])
            ->andFilterWhere(['ilike', 'photo', $this->photo])
            ->andFilterWhere(['ilike', 'about', $this->about]);

        return $dataProvider;
    }
}
