<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150514_113816_create_writer_log extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%writer_log}}', [
            'id' => Schema::TYPE_PK,
            'writer_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'writings_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'action' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));

        $this->createIndex('writer_log_writer_id', '{{%writer_log}}', 'writer_id');

        $this->addForeignKey('writer_log_fk_writings_id', '{{%writer_log}}', 'writings_id', '{{%writings}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('writer_log_fk_writer_id', '{{%writer_log}}', 'writer_id', '{{%writer}}', 'id', 'CASCADE', 'CASCADE');


    }

    public function safeDown()
    {
        $this->dropTable("{{%writer_log}}");
    }
}
