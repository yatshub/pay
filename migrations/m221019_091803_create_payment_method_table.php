<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_method}}`.
 */
class m221019_091803_create_payment_method_table extends Migration
{
    /**
     * @var string
     */
    public string $tableName = '{{%payment_method}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'payment_id' => 'integer NOT NULL REFERENCES {{%payment_system}}(id)',
            'name' => $this->string(100)->notNull(),
            'description' => $this->string(255)->null(),
            'enabled' => $this->smallInteger(1)->defaultValue(1),
            'position' => $this->integer()->null(),
            'commission' => $this->float()->notNull(),
            'available_in_countries' => $this->string(255)->null(),
            'available_except_countries' => $this->string(255)->null(),
        ]);

        $this->createIndex(
            'idx-payment_method-payment_id',
            $this->tableName,
            'payment_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
