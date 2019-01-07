<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Books;

/**
 * BooksSearch represents the model behind the search form of `app\models\Books`.
 */
class BooksSearch extends Books
{
    public $authName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'auth_id'], 'integer'],
            [['title', 'date_at'], 'safe'],
            [['authName'], 'safe'],
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

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'title',
                'authName' => [
                    'asc' => ['auth.name' => SORT_ASC],
                    'desc' => ['auth.name' => SORT_DESC],
                    'label' => 'Автор'
                ],
                'date_at',
            ]
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['auth']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'auth_id' => $this->auth_id,
            'date_at' => $this->date_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->joinWith(['auth' => function ($q) {
            $q->where('auth.name LIKE "%' . $this->authName . '%"');
        }]);
        return $dataProvider;
    }
}
