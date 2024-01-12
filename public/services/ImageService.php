<?php

namespace app\services;

use app\forms\ReviewForm;
use app\models\ReviewedImage;
use Exception as BaseException;
use yii\httpclient\Client;
use yii\httpclient\Exception;
use yii\web\Session;

class ImageService
{
    private const BASE_URL = 'https://picsum.photos/id/';
    private const IMG_WIDTH = 600;
    private const IMG_HEIGHT = 500;
    public const IMAGE_ID_SESSION_KEY = 'lastGeneratedImageId';

    private static array $range;

    public function __construct(
        private Client $client,
        private Session $session
    )
    {
        static::$range = range(1, 100);
    }

    /**
     * @throws Exception
     * @throws BaseException
     */
    public function getImage(?int $id = null): ?string
    {
        return $this->client->get(self::getFullUrl($id ?? $this->getImageId()))->send()->getContent();
    }

    /**
     * @throws BaseException
     */
    public static function getFullUrl($id): string
    {
        return sprintf(
            '%s%s',
            self::BASE_URL,
            sprintf('%d/%d/%d', $id, self::IMG_WIDTH, self::IMG_HEIGHT)
        );
    }

    public function saveReviewedImage(array $data): bool|array
    {
        $form = new ReviewForm($this->session);
        $form->load($data, ReviewForm::FORM_NAME);

        return $form->process();
    }

    private function getExistedImagesIds(): array
    {
        return ReviewedImage::find()->select('image_id')->column();
    }

    /**
     * @throws BaseException
     */
    private function getImageId(): int
    {
        $allowedRange = array_values(array_diff(static::$range, $this->getExistedImagesIds()));
        $id = $allowedRange[random_int(0, array_key_last($allowedRange))];
        $this->session->set(self::IMAGE_ID_SESSION_KEY, $id);

        return $id;
    }
}