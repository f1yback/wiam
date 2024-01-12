<?php

namespace app\forms;

use app\enums\ImageStatusEnum;
use app\models\ReviewedImage;
use app\services\ImageService;
use yii\base\Model;
use yii\web\Session;

class ReviewForm extends Model
{
    public const FORM_NAME = 'Form';

    public ?int $status = null;

    public function __construct(
        private Session $session,
        $config = []
    )
    {
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['status'], 'integer'],
            [['status'], 'required'],
            ['status', 'in', 'range' => ImageStatusEnum::cases()],
        ];
    }

    private function saveReviewedImage(): bool
    {
        return (new ReviewedImage([
            'image_id' => $this->session->get(ImageService::IMAGE_ID_SESSION_KEY),
            'status' => $this->status
        ]))->save();
    }

    public function process(): bool|array
    {
        if ($this->validate() && $this->saveReviewedImage()) {
            return true;
        }

        return $this->errors;
    }
}