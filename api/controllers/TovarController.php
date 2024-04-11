<?php
namespace api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use yii\web\Response;
use common\models\Tovar;

class FileController extends ActiveController
{
    public $modelClass = 'common\models\Tovars';

    public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (!empty(Yii::$app->request->post())) 
        {
            $tovar = new Tovar();
            $tovar->Название = Yii::$app->request->post('name');
            $tovar->Производитель=Yii::$app->request->post('Производитель');
            $tovar->Теги=Yii::$app->request->post('Теги');
            $tovar->Цена=Yii::$app->request->post('Цена');
            $tovar->Описание=Yii::$app->request->post('Описание');
            $tovar->Дата_Производства=Yii::$app->request->post('Дата_Производства');
            $tovar->Производитель=Yii::$app->request->post('Производитель');
        
            if($tovar->save())
                {
                return $this->formatResponse(true, "КИТАЙ ГОРД ВАМИ - ТОВАР СОЗДАН");
                }
            else
                {
                return $this->formatResponse(false,"КИТАЙ ПАРТИЯ ВЫСЛАТЬ ВАС В ГУЛАГ - ТОВАР НЕ СОЗДАН!");
                }
        }

    }
}
