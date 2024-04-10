<?php
namespace api\controllers;

use Yii;
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

        if (!$model->file || !$model->validate()) {
            return $this->formatResponse(false, 'Китай вами НЕ ГОРДИТСЯ вас выслать в ГУЛАГ и отобрать МИСКА РИС:');
        }

        $model->name = $this->generateFileName($model->file);
        $model->path = $model->upload();

        if (!$model->save(false)) {
            return $this->formatResponse(false, 'Ошибка сохранения файла - - Китай вами НЕ ГОРДИТСЯ вас выслать в ГУЛАГ и отобрать МИСКА РИС: '. implode(', ', $model->getFirstErrors()));
        }

        return $this->formatResponse(true, "Файл успешно загружен и сохранен в базе данных - Китай вами ГОРДИТЬСЯ! вам выдать МИСКА РИС и КОШКО ЖЕНА");
    }

    private function formatResponse($success, $message)
    {
        return ['success' => $success, 'message' => $message];
    }

    private function generateFileName($file)
    {
        return $file->baseName . '-' .time(). '.' . $file->extension;
    }
}
