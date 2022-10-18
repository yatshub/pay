<?php

namespace pay;

class PaymentSystem
{
    public const PAYMENTS = [
        [
            'id' => 1,
            'name' => 'Interkassa',
            'description' => 'Interkassa',
            'enabled' => true,
        ],
        [
            'id' => 2,
            'name' => 'PayU',
            'description' => 'PayU',
            'enabled' => true,
        ],
        [
            'id' => 3,
            'name' => 'CardPay',
            'description' => 'CardPay',
            'enabled' => true,
        ],
    ];

    public int $id;
    public string $name;
    public string $description;
    public bool $enabled;

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
        return $this->enabled;
    }
}
