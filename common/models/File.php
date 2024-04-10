<?php
 
 namespace common\models;
 
use yii\base\Model;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
 
class File extends ActiveRecord
{
    /**
     * 
     * @property integer $id
     * @property string $name
     * @property string $path
     * @property integer $created_at
     * @property integer $updated_at
     */
    
     public function tableName()
     {
         return '{{%file}}';
     }
     public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

      /**
     * {@inheritdoc}
     */
 
    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg,jpeg,txt,csv,doc,docx,xls,xlsx,ppt,pptx,pdf,odt,ods,'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            
            $new_name = '/api/web/files' . $this->file->baseName . '-' .time(). '.' . $this->file->extension;
                    
            $this->file->saveAs($new_name);
                 
            return $new_name;
                
        } 
        else {
            return false;
        }
    }
    public function getId()
    {
        return $this->getPrimaryKey();
    }
}