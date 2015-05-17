<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%domain}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property integer $type
 *
 * @property Writings[] $writings
 */
class Domain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%domain}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWritings()
    {
        return $this->hasMany(Writings::className(), ['domain_id' => 'id']);
    }

    public static function getList($type = null)
    {
        $domains = self::find();
        if ($type) {
            $domains->Where(['type' => $type]);
        }
        return $domains->with('writings')->all();
    }
}
