<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150516_145855_create_tag extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%tag}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'type' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 1',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));

        $this->createIndex('tag_name', '{{%tag}}', 'name');
    }

    public function safeDown()
    {
        $this->dropTable("{{%tag}}");
    }
}
