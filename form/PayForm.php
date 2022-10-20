<?php

namespace pay\form;

use pay\models\CountryCode;
use pay\models\Lang;
use pay\models\Os;
use pay\models\ProductType;
use yii\base\Model;

/**
 * @property string $productType
 * @property float $amount
 * @property string $lang
 * @property string $countryCode
 * @property string $os
 */
class PayForm extends Model
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
    public $os;

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['productType', 'amount', 'lang', 'countryCode', 'os'], 'required'],
            [['productType'], 'exist',
                'skipOnError' => true,
                'targetClass' => ProductType::class,
                'targetAttribute' => ['productType' => 'name']
            ],
            [['lang'], 'exist',
                'skipOnError' => true,
                'targetClass' => Lang::class,
                'targetAttribute' => ['lang' => 'name']
            ],
            [['countryCode'], 'exist',
                'skipOnError' => true,
                'targetClass' => CountryCode::class,
                'targetAttribute' => ['countryCode' => 'code']
            ],
            [['os'], 'exist',
                'skipOnError' => true,
                'targetClass' => Os::class,
                'targetAttribute' => ['os' => 'name']
            ],
            [['productType', 'lang', 'countryCode', 'os'], 'trim'],
        ];
    }
}
