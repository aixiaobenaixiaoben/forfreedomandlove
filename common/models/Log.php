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

    /**
     * get the data about the visitor
     * @return mixed
     */
    private static function getData()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $string = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=' . $ip);

        $json = json_decode($string);
        $json->ip = $ip;
        return $json;
    }

    /**
     * create a log for the visitor who has visited a particular article
     * @param $writing_id
     */
    public static function createLog($writing_id)
    {
        $json = self::getData();

        $log = new self();
        $log->writings_id = $writing_id;
        $log->ip = $json->ip;
        $log->country = $json->country;
        $log->province = $json->province;
        $log->city = $json->city;
        $log->save();
    }

    /**
     * when visitor visit the homepage ,create a special log to sign that he has visit my homepage
     * @param $massage
     */
    public static function countVisit($massage)
    {
        $json = self::getData();
        $log = new self();
        $log->writings_id = 1;
        $log->ip = $json->ip;
        $log->country = $json->country;
        $log->province = $json->province;
        $log->city = $json->city;
        $log->isp = $massage;
        $log->save();
    }
}
