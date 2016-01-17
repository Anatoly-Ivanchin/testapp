<?php

class User extends CActiveRecord
{
	const ROLE_USER=0;
	const ROLE_PERSONAL=1;
	const ROLE_MANAGER=2;
	const ROLE_ADMIN=3;
	
	const SEX_MALE=2;
	const SEX_FEMALE=1;
	const SEX_BI=0;
	
	const DEFAULT_AVA='/images/user/ava_preview.png';
	const DEFAULT_AVA_FULL='/images/user/ava.png';
	
	protected $userName='';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function current()
	{
		return self::model()->findByPk(Yii::app()->user->id);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'User';
	}

	public function relations()
	{
		return array(
			'networks'=>array(self::HAS_MANY, 'Network', 'userId'),
		);
	}	
	
	public function rules()
	{
		return array(
		    array('password, email, lastName, firstName, city,country', 'length','max'=>128),
			array('password', 'length','max'=>32,'min'=>6, 'on'=>'insert'),
		    array('email', 'required' ),
			array('email', 'unique','on'=>'insert' ),
			array('email', 'email' ),
			array('phone','length','min'=>11,'max'=>'11'),
			array('bDate', 'type', 'type'=>'date','dateFormat'=>'yyyy-M-d'),
		    array('role', 'in', 'range'=>array_keys($this->getRolesOptions())),
			array('sex', 'in', 'range'=>array_keys($this->getSexOptions())),
			array('profile','safe')
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'password'=>'Пароль',
			'activated'=>'Активный',
			'firstName'=>'Имя',
			'lastName'=>'Фамилия',
			'regDate'=>'Дата регистрации',
			'bDate'=>'Дата рождения',
		    'email'=>'e-mail',
			'phone'=>'Телефон',
			'city'=>'Город',
			'country'=>'Страна',
			'sex'=>'Пол',
		    'profile'=>'О себе',
		    'role'=>'Роль',
		    'ava'=>'Превью аватар',
			'ava_full'=>'Аватар'
		);
	}
	
	public function beforeSave()
	{
		if($this->getIsNewRecord()) {
			$this->role = self::ROLE_USER;
			$this->regDate=new CDbExpression('now()');
		}
		return parent::beforeSave();
	}
	
	protected function afterDelete()
	{
		foreach ($this->networks as $nw)
			$nw->delete();
		parent::afterDelete();
	}
	
	public function getUserLink()
	{
		if($this->id==Yii::app()->user->id)
		    $name='Я';
		else
		    $name=$this->getUserName();
		return CHtml::link($name,array('/users/default/show','id'=>$this->id)) ;
	}
	
	public function getUserName($order=0)
	{
		if($this->userName==='')
		{
			if($this->firstName && $this->lastName)
				if($oreder==0)
					$this->userName=$this->firstName.' '.$this->lastName;
				else 
					$this->userName=$this->firstName.' '.$this->lastName;
			elseif($this->firstName)
				$this->userName=$this->firstName;
			elseif($this->lastName)
				$this->userName=$this->lastName;
			else 
				$this->userName=$this->email;
		}
		return $this->userName;
	}
	
	public function getAvatar($htmlOptions=array())
	{
		if(!isset($htmlOptions['title']))
		    $htmlOptions['title']=$this->getUserName();
		$avatar=$this->ava?$this->ava:'guest.png';
		return CHtml::image('/upload/image/avatars/'.$avatar,$this->username,$htmlOptions);
	}
	
	public function getAvaUrl()
	{
		if(isset($this->ava))
			return $this->ava;
		else 
			return self::DEFAULT_AVA;
	}
	
	public function getAvaFullUrl()
	{
		if(isset($this->ava))
			return $this->ava_full;
		else
			return self::DEFAULT_AVA_FULL;
	}
	
	public function getRolesOptions()
	{
		return array(
		    self::ROLE_ADMIN=>'admin',
			self::ROLE_MANAGER=>'manager',
		    self::ROLE_PERSONAL=>'personal',
		    self::ROLE_USER=>'user',
		);
	}
	
	public function getRoleName()
	{
		$roles = $this->getRolesOptions();
		return $roles[$this->role];
	}
	
	public function getSexOptions()
	{
		return array(
				self::SEX_BI=>'Неопределено',
				self::SEX_FEMALE=>'Ж',
				self::SEX_MALE=>'М',
		);
	}
	
	public function getSexName()
	{
		$sexes = $this->getSexOptions();
		return $sexes[$this->sex];
	}
	
	protected function generatePassword($value)
	{
		return md5($value);
	}
	
	public function setPassword($value)
	{
		$this->password=$this->generatePassword($value);
	}
	
	public function comparePassword($value)
	{
		return $this->generatePassword($value)==$this->password;
	}
}