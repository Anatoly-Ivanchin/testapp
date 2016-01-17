<?php

class UloginWidget extends CWidget
{
	public $display = 'panel';
	public $fields = array('first_name','email');
	public $optional = array('last_name','sex','bdate','phone','photo','photo_big','city','country');
	public $providers = array('vkontakte','facebook','google','odnoklassniki');
	public $hidden = array('twitter','mailru','yandex','livejournal','openid','lastfm','linkedin','liveid','soundcloud','steam');
  	public $showButtunsAlways=false;
	public $action=array('/users/default/login');
	public $actionLogout=array('/users/default/logout');
	public $callback=null;

    public function run()
    {
    	//$this->setId("uLogin");
    	$redirect=$this->getController()->createAbsoluteUrl($this->action[0],array_splice($this->action, 1));
        //подключаем JS скрипт
        Yii::app()->clientScript->registerScriptFile('http://ulogin.ru/js/ulogin.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScript($this->getId(),"uLogin.customInit(\"uLogin_".$this->getId()."\");");
        $this->render('uloginWidget', $redirect);
    }
    
    public function __set($name,$value) 
    {
    	if(isset($this->params[$name]))
    		$this->params[$name]=$value;
    	else
    		return parent::__set($name, $value);
    }

}
