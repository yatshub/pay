<?php

namespace pay\models;

use yii\db\Expression;
use yii\db\ActiveQuery;

class PaymentMethodQuery extends ActiveQuery
{
    /**
     * @param int $enabled
     * @return $this
     */
    public function enabledPaySystem(int $enabled = 1): self
    {
        return $this->andWhere([PaymentSystem::tableName() . '.enabled' => $enabled]);
    }

    /**
     * @param int $enabled
     * @return $this
     */
    public function enabledPayMethod(int $enabled = 1): self
    {
        return $this->andWhere([PaymentMethod::tableName() . '.enabled' => $enabled]);
    }


    /**
     * @return $this
     */
    public function orderByPosition(): self
    {
        return $this->orderBy(PaymentMethod::tableName() . '.position ASC');
    }

    /**
     * @param $db
     * @return array|\yii\db\ActiveRecord[]
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @param $db
     * @return array|\yii\db\ActiveRecord|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
