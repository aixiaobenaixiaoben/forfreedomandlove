<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150516_145837_create_domain extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%domain}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));
    }

    public function safeDown()
    {
        $this->dropTable("{{%domain}}");
    }
}
