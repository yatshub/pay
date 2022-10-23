<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_for_payment_system}}`.
 */
class m221019_114018_create_data_for_payment_system_table extends Migration
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
        $this->batchInsert($this->tableName, ['name', 'description'], [
            [
                'Interkassa',
                'Платежная система'
            ],
            [
                'PayU',
                'Платежная система'
            ],
            [
                'CardPay',
                'Платежная система'
            ],
            [
                'WalletRefill',
                'Платежная система'
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable($this->tableName);
    }
}
