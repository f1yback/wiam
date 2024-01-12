<?php

namespace app\controllers;

use app\actions\GetImageAction;
use app\actions\ImageReviewedAction;
use yii\web\Controller;
use yii\web\ErrorAction;

class SiteController extends Controller
{
    public function actions(): array
    {
        return [
            'error' => ErrorAction::class,
            'get-image' => GetImageAction::class,
            'image-reviewed' => ImageReviewedAction::class
        ];
    }

    public function actionIndex(): string
    {
        $this->view->title = 'Wiam Test';

        return $this->render('index');
    }
}
