<?php

use console\migrations\Common;
use yii\db\Schema;
use yii\db\Migration;

class m150516_145911_create_relationship extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%relationship}}', [
            'id' => Schema::TYPE_PK,
            'writings_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'tag_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ], Common::getTableOptions($this->db));

        $this->addForeignKey('relationship_writings_id', '{{%relationship}}', 'writings_id', '{{%writings}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('relationship_tag_id', '{{%relationship}}', 'tag_id', '{{%tag}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable("{{%relationship}}");
    }
}
