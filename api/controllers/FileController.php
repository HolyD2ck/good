<?php
namespace api\controllers;
use Yii;
use yii\web\Response;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use app\models\UploadForm;
use common\models\File;

class FileController extends ActiveController
{

    public $modelClass = 'common\models\File';
    public function actionUpload()
    {
        $file =UploadedFile::getInstanceByName(Yii::$app->request->post("file"));
        
        if($file){
            $file->saveAs(Yii::$app->basePath. '/web/myfiles/'. $file->name);

            return ['success' => true, 'messege' => "Китай Партия Гордиться, Вам выдать Кошко Жена и Миска рис"];
        }
        else{
            return ['success' => false,'messege' => "Китай Партия Не Гордиться, Вас Выслать в Гулаг и отобрать Миска рис"];
        }
    }


}