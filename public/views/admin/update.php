<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReviewedImage $model */

$this->title = 'Update Reviewed Image: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reviewed Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reviewed-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
