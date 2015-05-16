<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%writings}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $type
 * @property integer $domain_id
 * @property string $created_at
 *
 * @property Log[] $logs
 * @property Relationship[] $relationships
 * @property Domain $domain
 */
class Writings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%writings}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['type', 'domain_id'], 'integer'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\models\writings', 'ID'),
            'title' => Yii::t('app\models\writings', 'Title'),
            'content' => Yii::t('app\models\writings', 'Content'),
            'type' => Yii::t('app\models\writings', '1:Programing 2:Literature'),
            'domain_id' => Yii::t('app\models\writings', 'Domain ID'),
            'created_at' => Yii::t('app\models\writings', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Log::className(), ['writings_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['writings_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(Domain::className(), ['id' => 'domain_id']);
    }
}
