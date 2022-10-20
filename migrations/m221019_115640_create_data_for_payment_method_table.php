<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_for_payment_method}}`.
 */
class m221019_115640_create_data_for_payment_method_table extends Migration
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
        $this->batchInsert(
            $this->tableName,
            ['payment_id', 'name', 'commission', 'position', 'available_in_countries'],
            [
                [
                    1,
                    'Банковские карты',
                    2.5,
                    1,
                    null
                ],
                [
                    1,
                    'LiqPay',
                    2,
                    2,
                    null
                ],
                [
                    1,
                    'Терминалы IBOX',
                    4,
                    99,
                    null
                ],
                [
                    2,
                    'Локальные карты Индии',
                    0,
                    3,
                    'IN'
                ],
                [
                    2,
                    'Карты VISA / MasterCard',
                    3,
                    1,
                    null
                ],
                [
                    2,
                    'Google Pay',
                    0,
                    3,
                    null
                ],
                [
                    2,
                    'Apple Pay',
                    0,
                    3,
                    null
                ],
                [
                    3,
                    'Visa / MasterCard',
                    1,
                    1,
                    null
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable($this->tableName);
    }
}
