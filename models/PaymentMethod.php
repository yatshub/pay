<?php

namespace pay\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $payment_id
 * @property string $name
 * @property string $description
 * @property integer $enabled
 * @property integer $position
 * @property float $commission
 * @property string $available_in_countries
 * @property string $available_except_countries
 */
class PaymentMethod extends ActiveRecord
{
    /**
     * {@inheritdoc}
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%payment_method}}';
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name', 'payment_id'], 'required'],
            [['position'], 'integer', 'min' => 1, 'max' => 999999999],
            [['name'], 'string', 'max' => 100],
            [['description', 'available_in_countries', 'available_except_countries'], 'string', 'max' => 255],
            [['payment_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => PaymentSystem::class,
                'targetAttribute' => ['payment_id' => 'id']
            ],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getPayment(): ActiveQuery
    {
        return $this->hasOne(PaymentSystem::class, ['id' => 'payment_id']);
    }

    /**
     * @return PaymentMethodQuery
     */
    public static function find(): PaymentMethodQuery
    {
        return new PaymentMethodQuery(get_called_class());
    }
}
