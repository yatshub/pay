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
        $data = [];
        $query = PaymentMethod::find()
            ->leftJoin(
                PaymentSystem::tableName(),
                PaymentMethod::tableName() . '.payment_id = ' . PaymentSystem::tableName() . '.id'
            )->enabledPayMethod()->enabledPaySystem()->orderByPosition();

        if ($this->productType == 'reward' && $this->lang == 'es' && $this->amount < 0.3) {
            $query = $query->andWhere([PaymentMethod::tableName() . '.name' => 'WalletRefill']);
        } else {
            $query = $query->andWhere([PaymentMethod::tableName() . '.os' => 'all']);
        }

        if ($this->lang == 'es') {
            $query = $query->andWhere(['<', PaymentMethod::tableName() . '.min_amount', (double)$this->amount]);
        }

        if ($this->userOs == 'ios') {
            $query = $query->orWhere([PaymentMethod::tableName() . '.os' => 'ios']);
        } elseif ($this->userOs == 'android') {
            if ($this->countryCode == 'IN') {
                $query = $query->orWhere([
                    'and',
                    [PaymentMethod::tableName() . '.os' => 'android'],
                    ['!=', PaymentMethod::tableName() . '.available_except_countries', 'IN']
                ]);
            } else {
                $query = $query->orWhere([PaymentMethod::tableName() . '.os' => 'android']);
            }
        }
        foreach ($query->all() as $key => $item) {
            /** @var $item PaymentMethod */
            $data[$key]['name'] = $item->name;
            $data[$key]['commission'] = $item->commission;
            $data[$key]['imageUrl'] = $item->getImageUrl();
            $data[$key]['payUrl'] = $item->getPayUrl();
        }
        return $data;
    }
}
