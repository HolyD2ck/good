<?php

use yii\db\Migration;

/**
 * Class m240411_021045_create_tovars
 */
class m240411_021045_create_tovars extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tovars}}', [
            'id' => $this->primaryKey(),
            'Название' => $this->string(255)->notNull(),
            'Производитель' => $this->string(255),
            'Теги' => $this->text(),
            'Цена' => $this->integer(),
            'Описание' => $this->text(),
            'Дата_Производства'=>$this->date(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%tovars}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240411_021045_create_tovars cannot be reverted.\n";

        return false;
    }
    */
}
