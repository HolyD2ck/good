<?php

use yii\db\Migration;

/**
 * Class m240410_020614_file_migration
 */
class m240410_020614_file_migration extends Migration
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

        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'path' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);
    }

    

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%file}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240410_020614_file_migration cannot be reverted.\n";

        return false;
    }
    */
}
