<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m180823_045901_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('country', [
            'id' => $this->primaryKey(),
            'country_name' => $this->string()->notNull(),
            'country_code' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('country');
    }
}
