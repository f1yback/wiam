<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReviewedImage $model */

$this->title = 'Create Reviewed Image';
$this->params['breadcrumbs'][] = ['label' => 'Reviewed Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviewed-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
