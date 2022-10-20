<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%os}}`.
 */
class m221019_122027_create_os_table extends Migration
{
    /**
     * @var string
     */
    public string $tableName = '{{%os}}';

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
                    'android',
                ],
                [
                    'ios',
                ],
                [
                    'windows',
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
