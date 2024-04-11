<?php
namespace api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use yii\web\Response;
use common\models\Tovar;

class TovarController extends ActiveController
{
    public $modelClass = 'common\models\Tovar';

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
    public function actionUpdate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if(!empty(Yii::$app->request->post()))
        {
            $tovar = Tovar::findOne(Yii::$app->request->post('id'));            
            $tovar->Название = Yii::$app->request->post('Название');
            $tovar->Производитель=Yii::$app->request->post('Производитель');
            $tovar->Теги=Yii::$app->request->post('Теги');
            $tovar->Цена=Yii::$app->request->post('Цена');
            $tovar->Описание=Yii::$app->request->post('Описание');
            $tovar->Дата_Производства=Yii::$app->request->post('Дата_Производства');

            if($tovar->save())
            {
            return $this->formatResponse(true, "КИТАЙ ГОРД ВАМИ - ТОВАР ОБНОВЛЕН");
            }
            else
            {
            return $this->formatResponse(false,"КИТАЙ ПАРТИЯ ВЫСЛАТЬ ВАС В ГУЛАГ - ТОВАР НЕ ОБНОВЛЕН!");
            }
        }
    }
    public function actionDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if(!empty(Yii::$app->request->delete()))
        {
            $tovar = Tovar::findOne(Yii::$app->request->post('id')); 
            if($tovar->delete())
            {
            return $this->formatResponse(true, "КИТАЙ ГОРД ВАМИ - ТОВАР УДАЛЕН");
            }
            else
            {
            return $this->formatResponse(false,"КИТАЙ ПАРТИЯ ВЫСЛАТЬ ВАС В ГУЛАГ - ТОВАР НЕ УДАЛЕН!");
            }
        }
    }
}
