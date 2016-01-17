<?php
Yii::import('application.components.behaviors.AbstractPicturesBehavior');
class MultiPictures extends AbstractPicturesBehavior
{
	public $imagesRelationName=null;
	
	protected $imgModel;
	protected $foreignKey=null;
	
	protected $_images=null;
	protected $_imageCount=null;
	
	protected $proccessedImg=array();
	
	public function attach($component)
	{
		if($this->imagesRelationName==null)
			throw new CException('Не указанно имя отношения для модели изображений!');
		$relation=$component->getActiveRelation($this->imagesRelationName);
		if(!$relation instanceof CHasManyRelation)
			throw new CException('Имя отношения для модели изображений указанно не верно!');
		$this->imgModel=$relation->className;
		$this->foreignKey=$relation->foreignKey;
		return parent::attach($component);
	}

	public function beforeValidate($event)
	{
		if(!isset($_POST['picturesKey']) || $this->imgModel==null)
			return;
		$tmpFiles=TmpUploads::model()->findByKey($_POST['picturesKey']);
		
		foreach ($tmpFiles as $file)
		{
			$img=$this->createImageSet($file->getFilePath());
			if(!$img)
			{
				$this->getOwner()->addError('','Не удалось обработать загруженные изображения');
				$event->isValid=false;
			}
			else
			{
				$this->proccessedImg[]=$img;
				$file->delete();
			}
		}
	}
	
	public function afterSave($event)
	{
		Yii::trace($this->getOwner()->getPrimaryKey(),"debug");
		foreach ($this->proccessedImg as $img)
		{
			
			$newImg=new $this->imgModel;
			$newImg->setAttribute($this->imgAttr, $img);
			$newImg->setAttribute($this->foreignKey, $this->getOwner()->getPrimaryKey());
			$newImg->save();
		}
		if(!isset($_POST[$this->imgModel]['delete']) || !is_array($_POST[$this->imgModel]['delete']))
			return;
		foreach ($_POST[$this->imgModel]['delete'] as $id=>$val)
		{
			$img=CActiveRecord::model($this->imgModel)->findByPk($id);
			$this->deleteImageSet($img->getAttribute($this->imgAttr));
			$img->delete();
		}
	}
	
	public function afterDelete($event)
	{
		foreach ($this->getImages() as $img)
		{
			$this->deleteImageSet($img->getAttribute($this->imgAttr));
			$img->delete();
		}
	}
	
	public function getSingleImage($random=true)
	{
		$cri=new CDbCriteria();
		$cri->addColumnCondition(array($this->foreignKey=>$this->getOwner()->id));
		if($random)
			$cri->order='RAND()';
		return CActiveRecord::model($this->imgModel)->find($cri);
	}
	
	public function getSingleImageUrl($type,$random=true)
	{
		$type=$this->getPictureType($type);
		if($this->getImagesCount()>0) 
		{
			$fileName=$this->getSingleImage($random)->getAttribute($this->imgAttr);
			$filePath=$type['path'].$fileName;
			if($this->imageExists($filePath))
				return $filePath;
		}
		if(isset($type['noimg']) && $this->imageExists($type['noimg']))
			return $type['noimg'];
		return '#';
	}
	
	public function getImages()
	{
		if($this->_images==null)
			$this->_images=$this->getOwner()->getRelated($this->imagesRelationName);
		return $this->_images;
	}
	
	public function getImagesCount()
	{
		if($this->_imageCount==null)
		{
			$cri=new CDbCriteria();
			$cri->addColumnCondition(array($this->foreignKey=>$this->getOwner()->id));
			$this->_imageCount=CActiveRecord::model($this->imgModel)->count($cri);
		}
		return $this->_imageCount;
	}
}