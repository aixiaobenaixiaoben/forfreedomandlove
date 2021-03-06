<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $created_at
 *
 * @property Relationship[] $relationships
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['created_at'], 'safe'],
            [['type'], 'integer'],
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
            'name' => 'Name',
            'type' => 'Type',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['tag_id' => 'id'])->orderBy('created_at DESC');
    }

    /**
     * @param null $type
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($type = null)
    {
        $tags = self::find();
        if ($type) {
            $tags->where(['type' => $type]);
        }
        return $tags->with('relationships')->all();
    }
}
