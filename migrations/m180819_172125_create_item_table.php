<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `item`.
 */
class m180819_172125_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('item', [
            'id' => $this->primaryKey(),
            'item_name' => Schema::TYPE_STRING . ' NOT NULL ',  // equal with $this->string()->notNull(),
            'item_price' => Schema::TYPE_INTEGER,
            'item_description' => Schema::TYPE_TEXT . ' NOT NULL '
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('item');
    }
}
