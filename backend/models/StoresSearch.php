<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Stores;

/**
 * StoresSearch represents the model behind the search form of `backend\models\Stores`.
 */
class StoresSearch extends Stores
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_ID'], 'integer'],
            [['store_Name', 'store_Logo'], 'safe'],
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
        $query = Stores::find();

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
            'store_ID' => $this->store_ID,
        ]);

        $query->andFilterWhere(['like', 'store_Name', $this->store_Name])
            ->andFilterWhere(['like', 'store_Logo', $this->store_Logo]);

        return $dataProvider;
    }
}
