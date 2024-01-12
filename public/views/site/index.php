<?php

use yii\helpers\Url;

?>
<div class="div-center">
    <div class="image-container">
        <img class="generated-image" src="<?= Url::to(['get-image']) ?>" alt="">
    </div>
    <div class="button-container">
        <button value="1" class="async-button btn btn-success">Одобрить</button>
        <button value="0" class="async-button btn btn-danger">Отклонить</button>
    </div>
    <div class="error-block">

    </div>
</div>