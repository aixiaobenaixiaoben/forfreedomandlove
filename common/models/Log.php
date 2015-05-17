<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property integer $id
 * @property integer $writings_id
 * @property string $ip
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $isp
 * @property string $created_at
 *
 * @property Writings $writings
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['writings_id', 'ip'], 'required'],
            [['writings_id'], 'integer'],
            [['created_at'], 'safe'],
            [['ip', 'country', 'province', 'city', 'isp'], 'string', 'max' => 255]
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
            'ip' => 'Ip',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'isp' => 'Carrier',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWritings()
    {
        return $this->hasOne(Writings::className(), ['id' => 'writings_id']);
    }
}
