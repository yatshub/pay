<?php

namespace pay\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $enabled
 */
class PaymentSystem extends ActiveRecord
{
    /**
     * {@inheritdoc}
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%payment_system}}';
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['position'], 'integer', 'min' => 1, 'max' => 999999999],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
        ];
    }
}
