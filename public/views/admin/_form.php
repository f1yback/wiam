<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReviewedImage $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reviewed-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
