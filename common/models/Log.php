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
            'id' => Yii::t('app\models\log', 'ID'),
            'writings_id' => Yii::t('app\models\log', 'Writings ID'),
            'ip' => Yii::t('app\models\log', 'Ip'),
            'country' => Yii::t('app\models\log', 'Country'),
            'province' => Yii::t('app\models\log', 'Province'),
            'city' => Yii::t('app\models\log', 'City'),
            'isp' => Yii::t('app\models\log', 'Carrier'),
            'created_at' => Yii::t('app\models\log', 'Created At'),
        ];
    }
}
