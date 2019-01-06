<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property int $author_id
 * @property string $date_at
 *
 * @property Auth $author
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
            [['title', 'auth_id', 'date_at'], 'required'],
            [['auth_id'], 'integer'],
            [['date_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['auth_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auth::className(), 'targetAttribute' => ['auth_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'auth_id' => 'Автор',
            'authName' => 'Автор',
            'date_at' => 'Дата',


        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuth()
    {
        return $this->hasOne(Auth::className(), ['id' => 'auth_id']);
    }

    /* Геттер для имени автора */
    public function getAuthName() {
        return $this->auth->name;
    }



}
