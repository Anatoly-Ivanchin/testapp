<?php
/**
 * ActiveRecord that could be extended by the behaviors
 * 
 * @author Anatoly Ivanchin
 * @version 1.0
 */
class ActiveRecordExtendable extends CActiveRecord
{
	protected $_safeAttributes=null;
	
	public function getSafeAttributeNames()
	{
		return array_merge(parent::getSafeAttributeNames(),$this->_safeAttributes);	
	}
	
	public function addSafeAttribute($name)
	{
		$this->_safeAttributes[]=$name;
	}
	
}