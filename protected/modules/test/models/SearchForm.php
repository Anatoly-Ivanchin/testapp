<?php
class SearchForm extends CFormModel
{
	// attributes
	public $author=null;
	public $name=null;
	public $startDate=null;
	public $endDate=null;
	
	public function rules()
	{
		return array(
			array('name', 'safe'),
		    array('author','in','range'=>array_keys(Authors::model()->getOptions()),'message'=>'Указанного автора не существует'),
			array('startDate,endDate','date','format'=>'yyyy-mm-dd','message'=>'Не верный формат даты'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'author'=>'Автор',
			'name'=>'Название книги',
			'startDate'=>'Дата выхода книги',
			'endDate'=>'до',	
		);
	}
	
	/**
	 * 
	 * @param CDBCriteria $criteria
	 */
	public function apllyFilter($criteria)
	{
		if(!$this->validate())
			return $criteria;
		if($this->name!=null)
			$criteria->addCondition('name LIKE "%'.$this->name.'%"');
		if($this->author!=null)
			$criteria->addCondition('author_id='.$this->author);
		if($this->startDate!=null)
			$criteria->addCondition('date>="'.$this->startDate.'"');
		if($this->endDate!=null)
			$criteria->addCondition('date<="'.$this->endDate.'"');
		
		return $criteria;
	}
}