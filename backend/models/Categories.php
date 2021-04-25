<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $category_ID
 * @property string $category_Name
 * @property int $stores_store_ID
 *
 * @property Books[] $books
 * @property Stores $storesStore
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_Name', 'stores_store_ID'], 'required'],
            [['stores_store_ID'], 'integer'],
            [['category_Name'], 'string', 'max' => 60],
            [['stores_store_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Stores::className(), 'targetAttribute' => ['stores_store_ID' => 'store_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_ID' => 'Category ID',
            'category_Name' => 'Category Name',
            'stores_store_ID' => 'Store Name',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['categories_category_ID' => 'category_ID']);
    }

    /**
     * Gets query for [[StoresStore]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoresStore()
    {
        return $this->hasOne(Stores::className(), ['store_ID' => 'stores_store_ID']);
    }
}
