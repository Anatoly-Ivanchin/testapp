<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_USER_IS_NOT_ACTIVATED=3;
	
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=User::model()->find('LOWER(email)=?',array(strtolower($this->username)));
		if($user===null)
		    $this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->comparePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
	    else if(!$user->activated)
			$this->errorCode=self::ERROR_USER_IS_NOT_ACTIVATED;
		else
		{
			$this->_id=$user->id;
			$this->username=$user->email;
			$this->errorCode=self::ERROR_NONE; 
		}
		return !$this->errorCode;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}