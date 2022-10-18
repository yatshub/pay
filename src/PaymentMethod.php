<?php

namespace pay;

class PaymentMethod
{
    public const PAY_METHOD = [
        [
            'id' => 1,
            'paymentId' => 1,
            'name' => 'Банковские карты',
            'description' => '',
            'commission' => 2.5,
            'enabled' => true,
            'position' => 0,
            'imageUrl' => 'cards.jpg',
            'payUrl' => '/pay/1'
        ],
        [
            'id' => 2,
            'paymentId' => 1,
            'name' => 'LiqPay',
            'description' => 'LiqPay',
            'commission' => 2,
            'enabled' => true,
            'position' => 1,
            'imageUrl' => 'liqpay.jpg',
            'payUrl' => '/pay/2'
        ],
        [
            'id' => 3,
            'paymentId' => 1,
            'name' => 'Терминалы IBOX',
            'description' => 'Терминалы IBOX',
            'commission' => 4,
            'enabled' => true,
            'position' => 99,
            'imageUrl' => 'terminal.jpg',
            'payUrl' => '/pay/3'
        ],
        [
            'id' => 4,
            'paymentId' => 2,
            'name' => 'Локальные карты Индии',
            'description' => 'Локальные карты Индии',
            'commission' => 6,
            'enabled' => true,
            'position' => 1,
            'imageUrl' => 'local-cards.jpg',
            'payUrl' => '/pay/4'
        ],
        [
            'id' => 5,
            'paymentId' => 2,
            'name' => 'Карты VISA / MasterCard',
            'description' => 'Карты VISA / MasterCard',
            'commission' => 3,
            'enabled' => true,
            'position' => 0,
            'imageUrl' => 'visa-master-card.jpg',
            'payUrl' => '/pay/5'
        ],
        [
            'id' => 6,
            'paymentId' => 3,
            'name' => 'Visa / MasterCard ',
            'description' => 'Visa / MasterCard ',
            'commission' => 1,
            'enabled' => true,
            'position' => 0,
            'imageUrl' => 'visa-master-card.jpg',
            'payUrl' => '/pay/6'
        ],
    ];

    public int $id;
    public string $name;
    public string $description;
    public bool $enabled;
    public float $commission;
    public string $imageUrl;
    public string $payUrl;
    public PaymentSystem $payment;

    /**
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        foreach ($fields as $key => $field) {
            $this->{$key} = $field;
        }
    }

    /**
     * @return PaymentSystem
     */
    public function getPayment(): PaymentSystem
    {
        return $this->payment;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function getEnabled(): bool
    {
        return $this-$this->enabled;
    }

    /**
     * @return float
     */
    public function getCommission(): float
    {
        return $this->commission;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @return string
     */
    public function getPayUrl(): string
    {
        return $this->payUrl;
    }
}