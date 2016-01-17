<?php

class UloginUserIdentity implements IUserIdentity
{

    private $id;
    private $name;
    private $isAuthenticated = false;
    private $states = array();

    public function __construct()
    {
    }

    public function authenticate($uloginModel = null)
    {

        $criteria = new CDbCriteria;
        $criteria->condition = 'identity=:identity AND network=:network';
        $criteria->params = array(
            ':identity' => $uloginModel->identity
        , ':network' => $uloginModel->network
        );
        $userNetwork = Network::model()->find($criteria);

        if (null !== $userNetwork) {
        	$user=$userNetwork->user;
            $this->id = $user->id;
            $this->name = $user->email;
        }
        else {
            $user= new User();
            $user->email = $uloginModel->email;
            $user->firstName = $uloginModel->first_name;
            $user->lastName=$uloginModel->last_name;
            $user->sex=$uloginModel->sex;
            $user->phone=$uloginModel->phone;
            $user->bDate=$this->convertDate($uloginModel->bdate);
            $user->city=$uloginModel->city;
            $user->country=$uloginModel->country;
            $user->ava=$uloginModel->photo;
            $user->ava_full=$uloginModel->photo_big;
            $user->activated=true;
            if(!$user->save()) {
            	return false;
            }
            
            $nw = new Network();
            $nw->identity = $uloginModel->identity;
            $nw->network = $uloginModel->network;
            $nw->userId=$user->id;
            $nw->save();

            $this->id = $user->id;
            $this->name = $user->username;
        }
        $this->isAuthenticated = true;
        return true;
    }
    
    protected function convertDate($date)
    {
    	$parts=explode('.', $date);
    	$parts=array_reverse($parts);
    	return implode('-', $parts);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIsAuthenticated()
    {
        return $this->isAuthenticated;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPersistentStates()
    {
        return $this->states;
    }
}