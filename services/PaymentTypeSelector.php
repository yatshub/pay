<?php

namespace pay\services;

use pay\models\PaymentMethod;
use pay\models\PaymentSystem;

class PaymentTypeSelector
{
    /**
     * @var string
     */
    public $productType;
    /**
     * @var float
     */
    public $amount;
    /**
     * @var string
     */
    public $lang;
    /**
     * @var string
     */
    public $countryCode;
    /**
     * @var string
     */
    public $userOs;

    public function __construct(string $productType, float $amount, string $lang, string $countryCode, string $userOs)
    {
        $this->productType = $productType;
        $this->amount = $amount;
        $this->lang = $lang;
        $this->countryCode = $countryCode;
        $this->userOs = $userOs;
    }

    /**
     * @return array
     */
    public function getButtons(): array
    {
        $query = PaymentMethod::find()
            ->leftJoin(
                PaymentSystem::tableName(),
                PaymentMethod::tableName() . '.payment_id = ' . PaymentSystem::tableName() . '.id'
            )->enabledPayMethod()->enabledPaySystem()->orderByPosition();

            $model = $query->all();
        foreach ($model as $item) {
            /** @var $item PaymentMethod */
            echo $item->name . PHP_EOL;
        }
        return [];
    }
}
