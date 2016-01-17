<?php

class UloginModel extends CModel {

    public $identity;
    public $network;
    public $email;
    public $bdate;
    public $sex;
    public $city;
    public $country;
    public $phone;
    public $photo;
    public $photo_big;
    public $first_name;
    public $last_name;
    public $token;
    public $error_type;
    public $error_message;

    private $uloginAuthUrl = 'http://ulogin.ru/token.php?token=';

    public function rules() {
        return array(
            array('identity,network,token', 'required'),
            array('email', 'email'),
            array('identity,network,photo,photo_big', 'length', 'max'=>255),
            array('first_name,last_name, city, country, email', 'length', 'max'=>128),
        	array('phone','length','max'=>11),
        	array('sex,bdate','safe')
        );
    }

    public function attributeLabels() {
        return array(
            'network'=>'Сервис',
            'identity'=>'Идентификатор сервиса',
            'email'=>'eMail',
            'full_name'=>'Имя',
        );
    }

    public function getAuthData() {
        $authData = json_decode(file_get_contents($this->uloginAuthUrl.$this->token.'&host='.$_SERVER['HTTP_HOST']),true);
        $this->setAttributes($authData);
        return $authData;
    }

    public function login() {
        $identity = new UloginUserIdentity();
        if ($identity->authenticate($this)) {
            $duration = 3600*24*30;
            Yii::app()->user->login($identity,$duration);
            return true;
        }
        return false;
    }

    public function attributeNames() {
        return array(
            'identity'
            ,'network'
            ,'email'
            ,'first_name',
        	'last_name',
        	'bdate',
        	'sex',
        	'city',
        	'country',
        	'phone',
        	'photo',
        	'photo_big',
            'token'
            ,'error_type'
            ,'error_message'
        );
    }
}