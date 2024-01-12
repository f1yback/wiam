<?php

use app\enums\ImageStatusEnum;
use app\models\ReviewedImage;
use app\services\ImageService;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\models\ReviewedImageSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var string $accessKey
 * @var string $accessValue
 */

$this->title = 'Reviewed Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviewed-image-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'image_id',
                'format' => 'raw',
                'value' => static fn(ReviewedImage $image) => Html::a(
                    ImageService::getFullUrl($image->image_id),
                    ImageService::getFullUrl($image->image_id),
                    ['target' => '_blank']
                )
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => static fn (ReviewedImage $image) => Html::tag(
                        'span',
                        ImageStatusEnum::from($image->status)->label(),
                        ['class' => ImageStatusEnum::from($image->status)->cssClass()]
                )
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{delete}',
                'buttons' => [
                    'delete' => static fn (string $url) => Html::a(
                            'Отмена',
                            sprintf("%s&%s=%s", $url, $accessKey, $accessValue),
                            ['class' => 'btn btn-danger'])
                ],
            ],
        ],
    ]); ?>


</div>
