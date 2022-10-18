<?php

require __DIR__ . "/vendor/autoload.php";

// Входные параметры, которые откуда-то приходят, неважно откуда
$productType        = 'book';       // book | reward | walletRefill (пополнение внутреннего кошелька)
$amount             = 85.10;        // any float > 0
$lang               = 'en';         // only en | es | uk
$countryCode        = 'IN';         // any country code in ISO-3166 format
$userOs             = 'android';    // android | ios | windows

$paymentTypeSelector = new \pay\PaymentTypeSelector($productType, $amount, $lang, $countryCode, $userOs);

foreach ($paymentTypeSelector->getButtons() as $btn) {
    /** @var $btn \pay\PaymentMethod */
    echo  PHP_EOL;
    echo 'Name: ' . $btn->getName() . PHP_EOL;
    echo 'Commission: ' . $btn->getCommission() . PHP_EOL;
    echo 'ImageUrl: ' . $btn->getImageUrl() . PHP_EOL;
    echo 'PayUrl: ' . $btn->getPayUrl() . PHP_EOL;
    echo  PHP_EOL;
}