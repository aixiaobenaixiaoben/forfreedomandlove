<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150514_112142_create_writings extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%writings}}', [
            'id' => Schema::TYPE_PK,
            'writer_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . '(10000) NOT NULL',
            'is_deleted' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 0',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));

        $this->addForeignKey('writings_writer_id', '{{%writings}}', 'writer_id', '{{%writer}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable("{{%writings}}");
    }
}
