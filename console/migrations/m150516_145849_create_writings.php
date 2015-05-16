<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150516_145849_create_writings extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%writings}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . '(10000) NOT NULL',
            'type' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 1 COMMENT "1:Programing 2:Literature"',
            'domain_id' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));

        $this->addForeignKey('writings_domain_id', '{{%writings}}', 'domain_id', '{{%domain}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable("{{%writings}}");
    }
}
