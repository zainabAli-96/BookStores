<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $book_ID
 * @property string $book_Name
 * @property string $book_Author
 * @property float $book_Price
 * @property string $book_Pic
 * @property int $stores_store_ID
 * @property int $categories_category_ID
 *
 * @property Stores $storesStore
 * @property Categories $categoriesCategory
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_Name', 'book_Author', 'book_Price', 'book_Pic', 'stores_store_ID', 'categories_category_ID'], 'required'],
            [['book_Price'], 'number'],
            [['stores_store_ID', 'categories_category_ID'], 'integer'],
            [['book_Name', 'book_Author', 'book_Pic'], 'string', 'max' => 60],
            [['stores_store_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Stores::className(), 'targetAttribute' => ['stores_store_ID' => 'store_ID']],
            [['categories_category_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['categories_category_ID' => 'category_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_ID' => 'Book ID',
            'book_Name' => 'Book Name',
            'book_Author' => 'Book Author',
            'book_Price' => 'Book Price',
            'book_Pic' => 'Book Pic',
            'stores_store_ID' => 'Store name',
            'categories_category_ID' => 'Category name',
        ];
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

    /**
     * Gets query for [[CategoriesCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesCategory()
    {
        return $this->hasOne(Categories::className(), ['category_ID' => 'categories_category_ID']);
    }
}
