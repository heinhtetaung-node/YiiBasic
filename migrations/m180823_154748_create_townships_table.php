<?php

use yii\db\Migration;

/**
 * Handles the creation of table `townships`.
 */
class m180823_154748_create_townships_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('townships', [
            'id' => $this->primaryKey(),
            'township_name' => $this->string()->notNull(),
            'township_code' => $this->string()->notNull(),            
            'country_id' => $this->integer()->defaultValue(NULL),
            'state_id' => $this->integer()->defaultValue(NULL),
        ]);

        $this->createIndex(
            'idx-twn-countryid',
            'townships',
            'country_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-twn-countryid',
            'townships',
            'country_id',
            'country',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-twn-stateid',
            'townships',
            'state_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-twn-stateid',
            'townships',
            'state_id',
            'state',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('townships');
    }
}
