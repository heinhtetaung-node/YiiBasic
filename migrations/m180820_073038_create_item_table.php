<?php

use yii\db\Migration;
use yii\db\Schema;


/**
 * Handles the creation of table `item`.
 */
class m180820_073038_create_item_table extends Migration
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
            'item_description' => Schema::TYPE_TEXT . ' NOT NULL ',
            'cat_id' => $this->integer()->defaultValue(NULL)
        ]);

        // creates index for column `cat_id`
        $this->createIndex(
            'idx-item-catid',
            'item',
            'cat_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-item-catid',
            'item',
            'cat_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-item-catid',
            'item'
        );

        $this->dropTable('item');
    }
}
