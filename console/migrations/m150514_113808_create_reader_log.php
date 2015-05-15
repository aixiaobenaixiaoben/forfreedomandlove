<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150514_113808_create_reader_log extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%reader_log}}', [
            'id' => Schema::TYPE_PK,
            'writings_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'ip' => Schema::TYPE_STRING . ' NOT NULL',
            'country' => Schema::TYPE_STRING,
            'province' => Schema::TYPE_STRING,
            'city' => Schema::TYPE_STRING,
            'isp' => Schema::TYPE_STRING . ' COMMENT "Carrier"',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));

        $this->createIndex('reader_log_id', '{{%reader_log}}', 'id');
        $this->createIndex('reader_log_writings_id', '{{%reader_log}}', 'writings_id');

        $this->addForeignKey('reader_log_fk_writings_id', '{{%reader_log}}', 'writings_id', '{{%writings}}', 'id', 'CASCADE', 'CASCADE');

    }

    public function safeDown()
    {
        $this->dropTable("{{%reader_log}}");
    }
}
