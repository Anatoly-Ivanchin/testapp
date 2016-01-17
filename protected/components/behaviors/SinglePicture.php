<?php
Yii::import('application.components.behaviors.AbstractPicturesBehavior'); 
class SinglePicture extends AbstractPicturesBehavior
{

	public function beforeValidate($event)
	{
		if(!isset($_POST['picturesKey']))
			return;
		$tmpFiles=TmpUploads::model()->findByKey($_POST['picturesKey']);
		
		foreach ($tmpFiles as $file)
		{
			$img=$this->createImageSet($file->getFilePath());
			if(!$img)
			{
				$this->getOwner()->addError($this->imgAttr,'Не удалось обработать изображение');
				$event->isValid=false;
			}
			else
			{
				$this->deleteImageSet($this->getImage());
				$this->getOwner()->setAttribute($this->imgAttr, $img);
				$file->delete();
			}
		}
	}
	
	public function afterDelete($event)
	{
		$this->deleteImageSet($this->getImage());
	}
	

	public function getImageUrl($type)
	{
		$pic=$this->getImage();
		return parent::getImageUrl($pic, $type);
	}
	
	public function hasImage($type)
	{
		$img=$this->getImage();
		if(!$img)
			return false;
		$type=$this->getPictureType($type);
		return parent::imageExists($type['path'].$img);		
	}
	
	protected function getImage()
	{
		return $this->getOwner()->getAttribute($this->imgAttr);
	}
}