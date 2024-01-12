<?php

namespace app\controllers;

use app\models\ReviewedImage;
use app\models\ReviewedImageSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class AdminController extends Controller
{
    private string $accessKey;
    private string $accessValue;

    public function __construct($id, $module, $config = [])
    {
        $params = Yii::$app->params;
        $this->accessKey = $params['access.key'];
        $this->accessValue = $params['access.value'];
        parent::__construct($id, $module, $config);
    }

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function () {
                            return $this->request->get($this->accessKey) === $this->accessValue;
                        }
                    ]
                ]
            ],
        ];
    }

    public function actionIndex(): string
    {
        $searchModel = new ReviewedImageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'accessKey' => $this->accessKey,
            'accessValue' => $this->accessValue
        ]);
    }

    public function actionDelete($id): Response
    {
        $this->findModel($id)?->delete();

        return $this->redirect(['index', $this->accessKey => $this->accessValue]);
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel($id): ?ReviewedImage
    {
        if (($model = ReviewedImage::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}