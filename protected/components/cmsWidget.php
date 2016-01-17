<?php
class cmsWidget extends CWidget
{
	public function getViewFile($viewName)
	{			
		if(($renderer=Yii::app()->getViewRenderer())!==null)
			$extension=$renderer->fileExtension;
		else
			$extension='.php';
		if(strpos($viewName,'.')) // a path alias
			$viewFile=Yii::getPathOfAlias($viewName);
		else 
		{
			if(($theme=Yii::app()->getTheme())!==null)
			{
				$themeViewPath=$theme->getViewPath().DIRECTORY_SEPARATOR.'widgets';
				if($file=$this->getFile($themeViewPath.DIRECTORY_SEPARATOR.$viewName, $extension))
					return $file;
			}
			$viewFile=$this->getViewPath().DIRECTORY_SEPARATOR.$viewName;
		}
		return $this->getFile($viewFile, $extension);
	}
	
	protected function getFile($viewFile,$ext)
	{
		if(is_file($viewFile.$extension))
			return Yii::app()->findLocalizedFile($viewFile.$extension);
		else if($extension!=='.php' && is_file($viewFile.'.php'))
			return Yii::app()->findLocalizedFile($viewFile.'.php');
		else
			return false;
	}
	
	
}