<?php
/*
 * Image cropper Yii Extension.
 * Created By Firas I. Kassem. phiras@gmail.com , http://twitter.com/fiso
 *
*/

class ImageCropper{
	
	/**
	 * 
	 * Enter description here ...
	 * @var EditableImg
	 */
	protected $src_img=null;
	
	public function __construct($src_path)
	{
		ini_set('memory_limit', '256M');
		$this->src_img=new EditableImg();
		$this->src_img->loadFromFile($src_path);
	}
	
	public function __destruct()
	{
		$this->src_img=null;
	}
	
	public function init() {}
	
	function resize_and_crop($dst_path, $width=null, $height=null, $quality=90)
	{
		$src_h=$this->src_img->getHeight();
		$src_w=$this->src_img->getWidth();
		
		if($width!=null)
		    $width_ratio = $src_w/$width;
		if($height!=null)
		    $height_ratio = $src_h/$height;
	
		if($width==null||$height==null)
		{
			$target_height = $src_h;
			$target_width =$src_w;
		}
		else
		{
			$percent = $width/$height;
			if($height_ratio < $width_ratio )
			{
				$target_height = $src_h;
				$target_width = $src_h * $percent;
			}
			else
			{
				$target_width = $src_w;
				$target_height = $src_w / $percent;
			}
		}
		
		if ($width==null)
		    $width = $src_w/$height_ratio;
		if ($height==null)
		    $height = $src_h/$width_ratio;
		
		$image_p = new EditableImg();
		$image_p->createNew($width, $height);

		$target_x=round(($src_w-$target_width)/2);
		$target_y=round(($src_h-$target_height)/2);
		
		$this->src_img->copyTo($image_p,0, 0, $target_x, $target_y, $width, $height, $target_width , $target_height);

		$res=$image_p->save($dst_path, $quality);
		$image_p=null;
		return $res;
	}
}
	
class EditableImg 
{
	protected $w=0;
	protected $h=0;
	protected $mime="";
	protected $type="";
	protected $img=null;
	
	public function loadFromFile($path) 
	{Yii::log("Load from file","info","MemmorySize");
		if(!is_file($path))
			return false;
		$info = getimagesize($path);
		$this->w=$info[0];
		$this->h=$info[1];
		$this->mime = $info['mime'];
		$this->type = substr(strrchr($mime, '/'), 1);
		
		switch ($this->type)
		{
			case 'png':
				$image_create_func = 'ImageCreateFromPNG';
				break;
			case 'bmp':
				$image_create_func = 'ImageCreateFromBMP';
				break;
			case 'gif':
				$image_create_func = 'ImageCreateFromGIF';
				break;
			default:
				$image_create_func = 'ImageCreateFromJPEG';
		}
		$mem_need=$info["bits"]*$this->w*$this->h*$info["channels"]/8;
	
		//Yii::log("Mem all: ".ini_get('memory_limit'),"info","MemmorySize");
		//Yii::log("Mem usage: ".memory_get_usage(true),"info","MemmorySize");
		Yii::log("Mem need: ".$mem_need,"info","MemmorySize");
		$mem_trend=memory_get_usage(true)+$mem_need;
		Yii::log("Mem usage trend: ".$mem_trend,"info","MemmorySize");
		$this->img=$image_create_func($path);
		Yii::log("Mem usage real: ".memory_get_usage(true),"info","MemmorySize");
		Yii::log("Mem diff real: ".(memory_get_usage(true)-$mem_trend),"info","MemmorySize");
	}
	
	public function createNew($w,$h)
	{
		$this->w=$w;
		$this->h=$h;
		$this->img=imagecreatetruecolor($w, $h);
	}
	
	public function __destruct()
	{
		imagedestroy($this->img);
	}
	
	public function getWidth()
	{
		return $this->w;
	}
	
	public function getHeight()
	{
		return $this->h;
	}
	
	public function copyTo($dst_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w , $src_h)
	{
		if (!imagecopyresampled($dst_img->img, $this->img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w , $src_h))
		    return false;
	}
	
	public function save($path, $quality) 
	{
		return imagejpeg($this->img, $path, $quality);
	}
}