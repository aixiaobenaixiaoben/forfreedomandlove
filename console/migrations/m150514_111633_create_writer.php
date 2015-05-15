<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150514_111633_create_writer extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%writer}}', [
            'id' => Schema::TYPE_PK,
            'ip_address' => Schema::TYPE_STRING . ' NOT NULL',
            'is_block' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 0',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'last_write_time' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ], Common::getTableOptions($this->db));

        $this->createIndex('writer_ip_address', '{{%writer}}', 'ip_address', true);

    }

    public function safeDown()
    {
        $this->dropTable("{{%writer}}");
    }
}
