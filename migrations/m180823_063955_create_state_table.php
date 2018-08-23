<?php

use yii\db\Migration;

/**
 * Handles the creation of table `state`.
 */
class m180823_063955_create_state_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('state', [
            'id' => $this->primaryKey(),
            'country_name' => $this->string()->notNull(),
            'country_code' => $this->string()->notNull(),            
            'country_id' => $this->integer()->defaultValue(NULL)
        ]);

        $this->createIndex(
            'idx-item-countryid',
            'state',
            'country_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-item-countryid',
            'state',
            'country_id',
            'country',
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
            'fk-item-countryid',
            'item'
        );

        $this->dropTable('state');
    }
}
