<?php
 
namespace common\models;
 
use yii\base\Model;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;
 
class File extends ActiveRecord
{
    /**
     * @property integer $id
     * @property string $name
     * @property string $path
     * @property integer $created_at
     * @property integer $updated_at
     */
    
    public $file;

    public static function tableName()
    {
        return '{{%file}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
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
            $new_name = Yii::getAlias('@api/web/myfiles') . '/' . $this->file->baseName . '-' .time(). '.' . $this->file->extension;
            if (!$this->file->saveAs($new_name)) {
                throw new \Exception('Ошибка сохранения файла: ' . $this->file->error);
            }
            return $new_name;
        } else {
            throw new \Exception('Ошибка валидации файла: ' . implode(', ', $this->getFirstErrors()));
        }
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }
}