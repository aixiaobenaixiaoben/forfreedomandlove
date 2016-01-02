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
    CONST TYPE_OF_PROGRAMING = 1;
    CONST TYPE_OF_LITERATURE = 2;


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
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'type' => '1:Programing 2:Literature',
            'domain_id' => 'Domain ID',
            'created_at' => 'Created At',
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

    public static function getList($type = null, $domain_id = null)
    {
        $writings = self::find();
        if ($type) {
            $writings->where(['type' => $type]);
        }
        if ($domain_id) {
            $writings->andWhere(['domain_id' => $domain_id]);
        }
        return $writings->orderBy('created_at DESC')->all();
    }
}



