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
            [
                'payment_id',
                'name',
                'commission',
                'position',
                'available_in_countries',
                'available_except_countries',
                'os',
                'min_amount'
            ],
            [
                [
                    1,
                    'Банковские карты',
                    2.5,
                    1,
                    null,
                    null,
                    'all',
                    0
                ],
                [
                    1,
                    'LiqPay',
                    2,
                    2,
                    null,
                    null,
                    'all',
                    0
                ],
                [
                    1,
                    'Терминалы IBOX',
                    4,
                    99,
                    null,
                    null,
                    'all',
                    0
                ],
                [
                    2,
                    'Локальные карты Индии',
                    0,
                    3,
                    null,
                    null,
                    'all',
                    0
                ],
                [
                    2,
                    'Карты VISA / MasterCard',
                    3,
                    1,
                    null,
                    null,
                    'all',
                    0
                ],
                [
                    2,
                    'Google Pay',
                    0,
                    3,
                    null,
                    'IN',
                    'android',
                    0
                ],
                [
                    2,
                    'Apple Pay',
                    0,
                    3,
                    null,
                    null,
                    'ios',
                    0
                ],
                [
                    3,
                    'Visa / MasterCard',
                    1,
                    1,
                    null,
                    null,
                    'all',
                    0
                ],
                [
                    3,
                    'PayPal',
                    1,
                    1,
                    null,
                    null,
                    'all',
                    0.3
                ],
                [
                    3,
                    'Оплата картой',
                    1,
                    1,
                    'UA',
                    null,
                    'all',
                    0
                ],
                [
                    3,
                    'Оплата картой ПриватБанка',
                    1,
                    1,
                    'UA',
                    null,
                    'all',
                    0
                ],
                [
                    4,
                    'WalletRefill',
                    1,
                    1,
                    null,
                    null,
                    'all',
                    0
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
