<?php
class jQueryAjaxFilter extends CFilter
{
	public function preFilter($fc)
	{
		if(Yii::app()->getRequest()->getIsAjaxRequest())
		{
			$config=require(YII_PATH.'/web/js/packages.php');
			$packages=$config[0];
			$jq=$packages['jquery'];
			Yii::app()->getClientScript()->scriptMap[$jq[0]]=false;
		}
		return true;
	}
}