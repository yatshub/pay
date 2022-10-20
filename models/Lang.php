<?php
namespace pay\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 */
class Lang extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%lang}}';
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }
}


