<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%relationship}}".
 *
 * @property integer $id
 * @property integer $writings_id
 * @property integer $tag_id
 * @property string $created_at
 *
 * @property Tag $tag
 * @property Writings $writings
 */
class Relationship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%relationship}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['writings_id', 'tag_id'], 'required'],
            [['writings_id', 'tag_id'], 'integer'],
            [['created_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'writings_id' => 'Writings ID',
            'tag_id' => 'Tag ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWritings()
    {
        return $this->hasOne(Writings::className(), ['id' => 'writings_id']);
    }

    public static function getList($tag_id)
    {
        return self::find()->where(['tag_id' => $tag_id])->with('writings')->all();
    }
}
