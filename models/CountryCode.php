<?php

namespace pay\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $code
 */
class CountryCode extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%country_code}}';
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function rules(): array
    {
        return [
            [['code'], 'required'],
            [['code'], 'string', 'max' => 100],
        ];
    }
}
