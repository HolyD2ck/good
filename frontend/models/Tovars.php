<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tovars".
 *
 * @property int $id
 * @property string $Название
 * @property string|null $Производитель
 * @property string|null $Теги
 * @property int|null $Цена
 * @property string|null $Описание
 * @property string|null $Дата_Производства
 * @property string $created_at
 * @property string $updated_at
 */
class Tovars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tovars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Название', 'created_at', 'updated_at'], 'required'],
            [['Теги', 'Описание'], 'string'],
            [['Цена'], 'integer'],
            [['Дата_Производства', 'created_at', 'updated_at'], 'safe'],
            [['Название', 'Производитель'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Название' => 'Название',
            'Производитель' => 'Производитель',
            'Теги' => 'Теги',
            'Цена' => 'Цена',
            'Описание' => 'Описание',
            'Дата_Производства' => 'Дата Производства',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
