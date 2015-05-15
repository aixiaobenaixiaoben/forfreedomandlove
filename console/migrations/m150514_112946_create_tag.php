<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150514_112946_create_tag extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%tag}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'show_order' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));

        $this->createIndex('tag_name', '{{%tag}}', 'name');
    }

    public function safeDown()
    {
        $this->dropTable("{{%tag}}");
    }
}
