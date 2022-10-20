<?php

namespace pay\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 */
class ProductType extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%product_type}}';
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }
}
