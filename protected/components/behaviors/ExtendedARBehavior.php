<?php
/**
 * Extended Active Record behavior.
 * Allows to define validation rules and relations in CActiveRecord style.
 * Work only with ActiveRecordExtendable class.
 * 
 * @author Anatoly Ivanchin
 * @version 1.0
 */
abstract class ExtendedARBehavior extends CActiveRecordBehavior
{
	/**
	 * @var CActiveRecord
	 */
	protected $_model=null;
	protected $_pk=null;
	protected $_validators=null;
	
	/**
	 * Returns the validation rules for attributes.
	 * This method should be overridden to declare validation rules like in CActiveRecord class.
	 * @return array()
	 */
	public function rules()
	{
		return array();
	}
	
	/**
	 * Define relations.
	 * This method should be overridden to declare related objects like in CActiveRecord class.
	 * @return array
	 */
	public function relations()
	{
		return array();
	}
	
	/**
	 * Define safe attributes.
	 * This method should be overridden to declare related objects like in CActiveRecord class.
	 * @return array
	 */
	public function safeAttributes()
	{
		return array();
	}
	
	public function attach($owner)
	{
		parent::attach($owner);
		$this->_model=$owner;
		$this->addRelations();
		$this->addSafeAttributes();
	}
	
	protected function addSafeAttributes()
	{
		foreach ($this->safeAttributes() as $name) {
			$this->_model->addSafeAttribute($name);
		}
	}
	
	protected function addRelations()
	{
		foreach ($this->relations() as $name=>$config){
			$this->_model->getMetaData()->addRelation($name,$config);
		}
	}
	
	public function getValidators()
	{
		if($this->_validators===null)
			$this->_validators=$this->addValidators();
		return $this->_validators;
	}
	
	protected function addValidators()
	{	
		$validators=new CList();
		foreach($this->rules() as $rule)
		{
			if(isset($rule[0],$rule[1]))  // attributes, validator name
			{
				$validator=CValidator::createValidator($rule[1], $this->_model, $rule[0], array_slice($rule,2));
				$validators->add($validator);
			}
			else
				throw new CException(Yii::t('yii','{class} has an invalid validation rule. The rule must specify attributes to be validated and the validator name.',
						array('{class}'=>get_class($this))));
		}
		return $validators;
	}
	
	public function validate() {
		foreach ($this->getValidators() as $validator) {
			$validator->validate($this->_model);
		}
	}
	
	public function beforeValidate($event)
	{
		$this->validate();
	}
	
	protected  function getPK()
	{
		if($this->_pk===null) {
			$this->_pk=$this->_model->getMetaData()->tableSchema->primaryKey;
		}
		return $this->_pk;
	}
}