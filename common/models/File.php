<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;

class File extends ActiveRecord
{
    public $file;

    public static function tableName()
    {
        return '{{%file}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }
    

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg,jpeg,txt,csv,doc,docx,xls,xlsx,ppt,pptx,pdf,odt,ods,'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $new_name = $this->getFilePath();
            if (!$this->file->saveAs($new_name)) {
                throw new \Exception('Ошибка сохранения файла - Китай вами НЕ ГОРДИТСЯ вас выслать в ГУЛАГ и отобрать МИСКА РИС: ' . $this->file->error);
            }
            return $new_name;
        } else {
            throw new \Exception('Ошибка валидации файла - Китай вами НЕ ГОРДИТСЯ вас выслать в ГУЛАГ и отобрать МИСКА РИС: ' . implode(', ', $this->getFirstErrors()));
        }
    }

    private function getFilePath()
    {
        return Yii::getAlias('@api/web/myfiles') . '/' . $this->file->baseName . '.' . $this->file->extension;
    }
}
