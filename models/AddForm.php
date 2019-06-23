<?php

namespace app\models;

use Yii;
use yii\base\Model;


class AddForm extends Model
{
    public $email;
    public $msg;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['email', 'msg'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /*
     * Method performs mysql query for saving new message
     * */
    public function addMessage($userData){

        Yii::$app->db->createCommand()->insert('tmd', [
            'email' => $userData['user_email'],
            'msg' => $userData['user_msg'],
            'device_type' => $userData['device_type'],
            'device_brand' => $userData['device_brand'],
            'device_name' => $userData['device_name'],
            'user_browser' => $userData['user_browser'],
            'user_os' => $userData['user_os'],
            'country' => $userData['user_country'],
            'city' => $userData['user_city'],
            ])->execute();
    }

    /*
     * Method forms appropriate array with user information
     * */
    public function formUserData($req) {

        $userData = array();
        $userData['user_email'] = $req['AddForm']['email'];
        $userData['user_msg'] = $req['AddForm']['msg'];

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browserInfo = get_browser(null, true);

        $userData['device_brand'] = $browserInfo['device_brand_name'];
        $userData['device_name'] = $browserInfo['device_name'];
        $userData['device_type'] = $browserInfo['device_type'];
        $userData['user_browser'] = $browserInfo['browser'];
        $userData['user_os'] = $browserInfo['platform'] . ' ' . $browserInfo['platform_version'];

        /* getting ip address */
//            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
//                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
//            } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
//            } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
//                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
//            } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
//                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
//            } else if (isset($_SERVER['HTTP_FORWARDED'])) {
//                $ipaddress = $_SERVER['HTTP_FORWARDED'];
//            } else if(isset($_SERVER['REMOTE_ADDR'])) {
//                $ipaddress = $_SERVER['REMOTE_ADDR'];
//            } else {
//                $ipaddress = 'Unknown';
//            }

        /* get user ip second method*/
        $geoip = new \lysenkobv\GeoIP\GeoIP();
        $ip = $geoip->ip();

        $country = (array) $ip->country;
        if ($country == NULL) {
            $userData['user_country'] = "Unknown";
        } else {
            $userData['user_country'] = $country[0];
        }

        $city = $ip->city;
        if ($city == NULL) {
            $userData['user_city'] = "Unknown";
        } else {
            $userData['user_city'] = $city;
        }

        return $userData;
    }
}
