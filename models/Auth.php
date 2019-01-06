<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auth".
 *
 * @property int $id
 * @property string $name
 * @property string $birthday
 *
 * @property Books[] $books
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'birthday'], 'required'],
            [['birthday'], 'safe'],
            [['name'], 'string', 'max' => 255],

        [
            ['birthday'],
            'match',
            'pattern' => '/^([^4-9]{1}[0-9]{1}\/[^2-9]{1}[0-2]{1}\/\d{2})+$/',
            'message' =>'Ошибка в дате dd/mm/yy'
        ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Автор',
            'birthday' => 'Дата рождения автора',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['auth_id' => 'id']);
    }
}
