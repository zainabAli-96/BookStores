<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Books;

/**
 * BooksSearch represents the model behind the search form of `backend\models\Books`.
 */
class BooksSearch extends Books
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_ID', 'stores_store_ID', 'categories_category_ID'], 'integer'],
            [['book_Name', 'book_Author', 'book_Pic'], 'safe'],
            [['book_Price'], 'number'],
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
        $query = Books::find();

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
            'book_ID' => $this->book_ID,
            'book_Price' => $this->book_Price,
            'stores_store_ID' => $this->stores_store_ID,
            'categories_category_ID' => $this->categories_category_ID,
        ]);

        $query->andFilterWhere(['like', 'book_Name', $this->book_Name])
            ->andFilterWhere(['like', 'book_Author', $this->book_Author])
            ->andFilterWhere(['like', 'book_Pic', $this->book_Pic]);

        return $dataProvider;
    }
}
