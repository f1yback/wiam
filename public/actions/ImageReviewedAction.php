<?php

namespace app\actions;

use app\services\ImageService;
use yii\base\Action;
use yii\web\Controller;
use yii\web\Response;

class ImageReviewedAction extends Action
{
    public function __construct(
        string $id,
        Controller $controller,
        private ImageService $imageService,
        array $config = []
    )
    {
        parent::__construct($id, $controller, $config);
    }

    public function run(): Response
    {
        return $this->controller->asJson(
            $this->imageService->saveReviewedImage($this->controller->request->post())
        );
    }
}