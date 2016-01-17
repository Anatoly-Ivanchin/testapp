<?php

class HierarchyBreadCrumbs extends CWidget
{
	public $model;
	public $splitter="/";
	public $rootElement=array('label'=>'root','url'=>'/');
	
	protected $chain=null;
	
	public function init()
	{
		$chain=array();
		$model=$this->model;
		while(($model=$model->parent)!==null)
			$chain[]=$model;
		$this->chain=$chain;
	}

	public function run()
	{
		echo CHtml::openTag('div',array('id'=>'breadcrumbs'));
		echo CHtml::link($this->rootElement['label'], $this->rootElement['url']);
		echo CHtml::tag('span', array('class'=>'splitter'),$this->splitter);
		foreach ($this->chain as $item)
		{
			echo CHtml::link($item->name, array('admin','id'=>$item->id));
			echo CHtml::tag('span', array('class'=>'splitter'),$this->splitter);
		}
		echo CHtml::tag('span', array('class'=>'current'),$this->model->name);
		echo CHtml::closeTag('div');
	}
}