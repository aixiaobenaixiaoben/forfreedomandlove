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
            'id' => Yii::t('app\models\relationship', 'ID'),
            'writings_id' => Yii::t('app\models\relationship', 'Writings ID'),
            'tag_id' => Yii::t('app\models\relationship', 'Tag ID'),
            'created_at' => Yii::t('app\models\relationship', 'Created At'),
        ];
    }
}
