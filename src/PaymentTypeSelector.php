<?php

namespace pay;

class PaymentTypeSelector
{
    private const PRODUCT_TYPE = [
        'book',
        'reward',
        'walletRefill'
    ];
    private const COUNTRY_CODE = [
        'UA',
        'KZ',
        'PL',
        'US',
        'DE',
        'FR',
        'IT'
    ];
    private const USER_OS = [
        'windows',
        'android',
        'ios',
    ];
    public $productType;
    public $amount;
    public $lang;
    public $countryCode;
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
        $getMethod = [];
        foreach (PaymentSystem::PAYMENTS as $payment) {
            $paymentSystem = (new \pay\PaymentSystem(
                $payment
            ));
            foreach (PaymentMethod::PAY_METHOD as $payMethod) {
                if ($paymentSystem->getId() == $payMethod['paymentId']) {
                    $getMethod[] = (new \pay\PaymentMethod(
                        $payMethod
                    ));
                }
            }
        }
        return $getMethod;
    }
}
