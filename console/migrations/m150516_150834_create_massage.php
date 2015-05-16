<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150516_150834_create_massage extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'message' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));
    }

    public function safeDown()
    {
        $this->dropTable("{{%message}}");
    }
}
