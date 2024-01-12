<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReviewedImage;

class ReviewedImageSearch extends ReviewedImage
{
    public function rules(): array
    {
        return [
            [['id', 'image_id', 'status'], 'integer'],
        ];
    }

    public function search($params): ActiveDataProvider
    {
        $query = ReviewedImage::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'image_id' => $this->image_id,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
