<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_system}}`.
 */
class m221019_090732_create_payment_system_table extends Migration
{
    /**
     * @var string
     */
    public string $tableName = '{{%payment_system}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'description' => $this->string(255)->null(),
            'enabled' => $this->smallInteger(1)->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
