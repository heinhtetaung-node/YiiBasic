<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180820_092944_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string(),            
            'access_token' => $this->string(),
            'role' => $this->smallInteger()->defaultValue(1)->comment("1 is admin(all access), 2 is editor(cannot do user), 3 is author(can only add, can edit)")
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
