<?php 
abstract class AbstractPicturesBehavior extends CActiveRecordBehavior
{
	public $imgAttr='picture';
	public $config='.config.pictures';
	public $settingsPath=null;
	
	protected $pictures=null;
	
	public function pictures()
	{
		if($this->pictures==null)
		{
			$path=yii::getPathOfAlias('webroot.themes.'.Yii::app()->theme->name.$this->config).'.php';
			if(!file_exists($path))
				$path=Yii::getPathOfAlias('application.'.$this->config).'.php';
			$conf=require $path;
			$index=$this->getSettingsIndex();
			$this->pictures=$conf[$index];
		}
		return $this->pictures;
	}
	
	protected function getSettingsIndex()
	{
		if($this->settingsPath==null)
			$index = get_class($this->getOwner());
		else 
			$index = call_user_func(array($this->getOwner(),$this->settingsPath));
		return $index;
	}
	
	protected function createImageSet($src_image)
	{
		Yii::import('application.extensions.ImageCropper');
		//Yii::log("Load source img: ".memory_get_usage(true),"info","MemmorySize");
		$cropper=new ImageCropper($src_image);
		
		$parts=preg_split('/[\/\\\]/',$src_image);
		$fileName=array_pop($parts);
		
		foreach ($this->pictures() as $type=>$pic)
		{
			if(isset($pic['vertical']) || isset($pic['horizontal']))
			{
				$Info=getimagesize($src_image);
				$orientation=($Info[0]<$Info[1])?'vertical':'horizontal';
				if(isset($pic[$orientation]))
				{
					$w=$pic[$orientation]['w'];
					$h=$pic[$orientation]['h'];
				}
			}
			else 
			{
				$w=$pic['w'];
				$h=$pic['h'];
			}
			
			$filePath = $_SERVER['DOCUMENT_ROOT'].$pic['path'].$fileName;
			if ($w==null && $h==null)
			{
				if (!copy($src_image,$filePath))
				    return false;
			}
			else
			{
				//Yii::log("Before resize \"".$type."\": ".memory_get_usage(true),"info","MemmorySize");
			    if (!$cropper->resize_and_crop($filePath, $w, $h))
			        return false;
			    //Yii::log("After resize \"".$type."\"".memory_get_usage(true),"info","MemmorySize");
			}
		}
		$cropper=null;
		return $fileName;
	}
	
	protected function deleteImageSet($file)
	{
		if($file!=null)
		{
			$pictures = $this->pictures();
			foreach ($pictures as $picture)
			{
				$picFile = $_SERVER['DOCUMENT_ROOT'].$picture['path'].$file;
				if(file_exists($picFile))
				    unlink($picFile);
			}				
		}
	}
	

	public function getImageUrl($img,$type)
	{
		$pictureType = $this->getPictureType($type);
		
		$file=$pictureType['path'].$img;
		if ($this->imageExists($file))
			return $file;
		if ($this->imageExists($pictureType['noimg']))
		    return $pictureType['noimg'];
		else
			return false;
	}
	
	protected function getPictureType($type)
	{
		$pictures = $this->pictures();
		
		if (isset($pictures[$type]))
			return $pictures[$type];
		else
		    throw new CException('picture type "'.$type.'" is not define!');
	}
	
	public function imageExists($path)
	{
		return is_file($_SERVER['DOCUMENT_ROOT'].$path);
	}
}