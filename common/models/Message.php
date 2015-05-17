<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%message}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $message
 * @property string $created_at
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'title', 'message'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'email', 'title', 'message'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'title' => 'Title',
            'message' => 'Message',
            'created_at' => 'Created At',
        ];
    }
}
