<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150509_134922_create_user extends Migration
{


    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',

            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ], Common::getTableOptions($this->db));
    }

    public function safeDown()
    {
        $this->dropTable("{{%user}}");
    }

}
