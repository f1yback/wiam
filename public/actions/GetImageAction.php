<?php

namespace app\actions;

use app\services\ImageService;
use yii\base\Action;
use yii\httpclient\Exception;
use yii\web\Controller;
use yii\web\Response;

class GetImageAction extends Action
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

    /**
     * @throws Exception
     */
    public function run(?int $id = null): ?string
    {
        $this->controller->response->format = Response::FORMAT_RAW;
        $this->controller->response->headers->add('content-type', 'image/jpg');

        return $this->imageService->getImage($id);
    }
}