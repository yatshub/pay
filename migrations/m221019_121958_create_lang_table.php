<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lang}}`.
 */
class m221019_121958_create_lang_table extends Migration
{
    /**
     * @var string
     */
    public string $tableName = '{{%lang}}';

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
                    'en',
                ],
                [
                    'es',
                ],
                [
                    'uk',
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
