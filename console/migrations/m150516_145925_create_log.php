<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150516_145925_create_log extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%log}}', [
            'id' => Schema::TYPE_PK,
            'writings_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'ip' => Schema::TYPE_STRING . ' NOT NULL',
            'country' => Schema::TYPE_STRING,
            'province' => Schema::TYPE_STRING,
            'city' => Schema::TYPE_STRING,
            'isp' => Schema::TYPE_STRING . ' COMMENT "Carrier"',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));

        $this->createIndex('log_writings_id', '{{%log}}', 'writings_id');

        $this->addForeignKey('log_fk_writings_id', '{{%log}}', 'writings_id', '{{%writings}}', 'id', 'CASCADE', 'CASCADE');

    }

    public function safeDown()
    {
        $this->dropTable("{{%log}}");
    }
}
