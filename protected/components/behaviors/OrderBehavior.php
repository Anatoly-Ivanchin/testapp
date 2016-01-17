<?php
class OrderBehavior extends CBehavior
{
	public $modelClass;
	public $priorityField='priority';
	public $modelListCondition;
	
	private $direction = null;
	private $model = null;
	private $listCondition = null;
	private $list = null;
	
	protected function getDirection()
	{
		if($this->direction == null)
		{
			if(isset($_GET['direction']) && in_array($_GET['direction'],array('up','down')))
			    $this->direction=$_GET['direction'];
			else
			    $this->direction = false;
		}
		return $this->direction;
	}
	
	protected function getModel()
	{
		if($this->model==null)
		{
			if(isset($_GET['model_id']))
			{
				$this->model = CActiveRecord::model($this->modelClass)->findByPk($_GET['model_id']);
			}
		}
		return $this->model;
	}
	
	protected function getListCondition()
	{
		if($this->listCondition == null)
		{
			$res = $this->modelListCondition;
			preg_match_all('/\{[^\{\}]+\}/',$res,$expressions);
			foreach ($expressions[0] as $expression)
			{
				$value = eval('return '.trim($expression,'{}').';');
				$res = str_replace($expression,$value,$res);
			}
			$this->listCondition = $res;
		}
		return $this->listCondition;
	}
	
	protected function getList()
	{
		if($this->list == null)
		{
			$cri = new CDbCriteria();
			$cri->condition = $this->getListCondition();
			$cri->order = $this->priorityField;
			$this->list = CActiveRecord::model($this->modelClass)->findAll($cri);
		}
		return $this->list;
	}
	
	private function getModelIndexInList()
	{
		foreach ($this->getList() as $key => $item)
		{
			if($item->getPrimaryKey()==$this->getModel()->getPrimaryKey())
			    return $key;
		}
	}
	
	public function updatePriority()
	{
		if(!$this->getDirection() || !$this->getModel() || !$this->getList())
		    return;

		$list = $this->getList();

		$offset = $this->getDirection()=='up'?$this->getModelIndexInList()-1:$this->getModelIndexInList();
		$modelWithNeighbour = array_slice($list,$offset,2);
		array_splice($list,$offset,2,array_reverse($modelWithNeighbour));
		
		foreach ($list as $k =>$v)
		{
			$v->setAttribute($this->priorityField,$k);
			$v->save(false);
		}
	}
	
	protected function updatePriorityAjax($model_id,$dir,$update)
	{
		$url= array('/'.$this->getOwner()->getRoute());
		$data=$_GET;
		$data['direction']=$dir;
		$data['model_id']=$model_id;
		
		return CHtml::ajax(
			array(
				'update'=>$update,
				'url'=>$url,
				'type'=>'get',
				'data'=>$data
			)
		);
	}
	
	public function upPriorityAjax($model_id,$update='#content')
	{
		return $this->updatePriorityAjax($model_id,'up',$update);
	}
	
	public function downPriorityAjax($model_id,$update='#content')
	{
		return $this->updatePriorityAjax($model_id,'down',$update);
	}
}