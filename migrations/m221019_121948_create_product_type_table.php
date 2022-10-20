<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_type}}`.
 */
class m221019_121948_create_product_type_table extends Migration
{
    /**
     * @var string
     */
    public string $tableName = '{{%product_type}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()
        ]);

        $this->batchInsert(
            $this->tableName,
            [
                'name'
            ],
            [
                [
                    'book',
                ],
                [
                    'reward',
                ],
                [
                    'walletRefill',
                ]
            ]
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
