<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $image_id
 * @property int $status
 */
class ReviewedImage extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'reviewed_images';
    }

    public function rules(): array
    {
        return [
            [['image_id', 'status'], 'required'],
            [['image_id', 'status'], 'default', 'value' => null],
            [['image_id', 'status'], 'integer'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'image_id' => 'Изображение',
            'status' => 'Решение',
        ];
    }
}
