<?php
namespace api\controllers;
use Yii;
use yii\web\Response;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use common\models\File;

class FileController extends ActiveController
{
    public $modelClass = 'common\models\File';

    public function actionUpload()
    {
        $model = new File();
        $model->file = UploadedFile::getInstanceByName('file'); 
    
        if (!$model->file) {
            Yii::error('Файл не был получен');
            return ['success' => false, 'message' => 'Файл не был получен'];
        }
    
        if($model->validate()){
            $model->name = $model->file->baseName . '-' .time(). '.' . $model->file->extension;
            $model->path = $model->upload();
            if (!$model->save()) {
                Yii::error('Ошибка сохранения файла: ' . implode(', ', $model->getFirstErrors()));
                return ['success' => false, 'message' => 'Китай Партия Не Гордиться, Вас Выслать в Гулаг и отобрать Миска рис '. implode(', ', $model->getFirstErrors())];
            }
            return ['success' => 'true','messege' => "Китай Партия Гордиться, Вам дать Миска рис и Кошко Жена"];
        }
        
        else{
            Yii::error('Ошибка валидации файла: ' . implode(', ', $model->getFirstErrors()));
            return ['success' => false, 'message' => 'Ошибка валидации файла: ' . implode(', ', $model->getFirstErrors())];
        }
    }
    
}