<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tmd".
 *
 * @property int $id
 * @property string $email
 * @property string $msg
 * @property string $device_type
 * @property string $device_brand
 * @property string $device_name
 * @property string $user_browser
 * @property string $user_os
 * @property string $country
 * @property string $city
 * @property string $date
 */
class Tmd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'msg', 'device_type', 'device_brand', 'device_name', 'user_browser', 'user_os', 'country', 'city'], 'required'],
            [['date'], 'safe'],
            [['email', 'msg', 'device_type', 'device_brand', 'device_name', 'user_browser', 'user_os', 'country', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'msg' => 'Msg',
            'device_type' => 'Device Type',
            'device_brand' => 'Device Brand',
            'device_name' => 'Device Name',
            'user_browser' => 'User Browser',
            'user_os' => 'User Os',
            'country' => 'Country',
            'city' => 'City',
            'date' => 'Date',
        ];
    }
}
