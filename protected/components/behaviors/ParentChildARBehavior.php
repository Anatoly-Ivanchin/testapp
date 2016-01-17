<?php
/**
 * 
 * @author Anatoly Ivanchin
 * @version 1.0
 */
Yii::import('application.components.behaviors.ExtendedARBehavior');
class ParentChildARBehavior extends ExtendedARBehavior
{
	/**
	 * @var CActiveRecord
	 */
	protected $_model=null;
	protected $_pk=null;
	protected $_validatorsWasInserted=false;
	
	public $parentChildLinkAttribute='parentId';
	public $illegalParentMsg='Wrong parent!';
	
	public function rules()
	{
		return array(
			array($this->parentChildLinkAttribute,'in','range'=>array_keys($this->getValidParents()),'message'=>$this->illegalParentMsg),
		);	
	}
	
	public function relations()
	{
		return array(
			'children'=> array(CActiveRecord::HAS_MANY,get_class($this->_model),$this->parentChildLinkAttribute),
			'parent'=> array(CActiveRecord::BELONGS_TO,get_class($this->_model),$this->parentChildLinkAttribute),
		);
	}
	
	public function safeAttributes()
	{
		return array($this->parentChildLinkAttribute);
	}
	
	protected function getDescendantsIds($item)
	{
		$result=array($item->{$this->getPK()});
		foreach ($item->children as $subItem) {
			$result+$this->getDescendantsIds($subItem);
		}
		return $result;
	}
	
	public function getValidParents()
	{
		$result=array();
		$criteria = new CDbCriteria();
		if (!$this->_model->getIsNewRecord())
			$criteria->addNotInCondition($this->getPK(), $this->getDescendantsIds($this->_model));
		foreach($this->_model->findAll($criteria) as $model)
			$result[$model->{$this->getPK()}]=$model->getCaption();
		return  $result;
	}
}