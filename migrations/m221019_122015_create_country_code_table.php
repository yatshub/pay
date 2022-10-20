<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country_code}}`.
 */
class m221019_122015_create_country_code_table extends Migration
{
    /**
     * @var string
     */
    public string $tableName = '{{%country_code}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country_code}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(100)->notNull()
        ]);

        $this->batchInsert(
            $this->tableName,
            [
                'code'
            ],
            [
                [
                    'UA',
                ],
                [
                    'KZ',
                ],
                [
                    'PL',
                ],
                [
                    'US',
                ],
                [
                    'DE',
                ],
                [
                    'FR',
                ],
                [
                    'IT',
                ],
                [
                    'IN',
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
