<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stores".
 *
 * @property int $store_ID
 * @property string $store_Name
 * @property string $store_Logo
 *
 * @property Books[] $books
 * @property Categories[] $categories
 */
class Stores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_Name', 'store_Logo'], 'required'],
            [['store_Name', 'store_Logo'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'store_ID' => 'Store ID',
            'store_Name' => 'Store Name',
            'store_Logo' => 'Store Logo',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['stores_store_ID' => 'store_ID']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['stores_store_ID' => 'store_ID']);
    }
}
