<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%domain}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
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
            [['name'], 'required'],
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
            'id' => Yii::t('app\models\domain', 'ID'),
            'name' => Yii::t('app\models\domain', 'Name'),
            'created_at' => Yii::t('app\models\domain', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWritings()
    {
        return $this->hasMany(Writings::className(), ['domain_id' => 'id']);
    }
}
