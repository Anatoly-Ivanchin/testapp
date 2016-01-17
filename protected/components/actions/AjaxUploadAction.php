<?php
class AjaxUploadAction extends CAction
{
	const TMP_DIR='/tmpUploads/';
	public $single=true;
	
	public function run()
	{
		if(isset($_POST['id']))
			$this->files();
		else
			$this->upload();
	}
	
	protected function upload()
	{
		$tempFolder=Yii::getPathOfAlias('webroot').self::TMP_DIR;

        @mkdir($tempFolder, 0777, TRUE);
        @mkdir($tempFolder.'chunks', 0777, TRUE);
        
        Yii::import("ext.EFineUploader.qqFileUploader");
        
        $uploader = new qqFileUploader();
        $uploader->allowedExtensions = array('jpg','jpeg','png','gif');
        $uploader->sizeLimit = 7 * 1024 * 1024;//maximum file size in bytes
        $uploader->chunksFolder = $tempFolder.'chunks';
        
        $result = $uploader->handleUpload($tempFolder);
        $result['filename'] = $uploader->getUploadName();
        $result['folder'] = $webFolder;
        
        $key=$_POST['key'];
        $tmp=new TmpUploads();
        $tmp->key=$key;
        
        $tmp->deleteUsersUploads($this->single);
        
		if(!ini_get('file_uploads'))
		{
			$tmp->error('Загрузка файлов запрещена настройками сервера');
			return;
		}
		if(isset($result['error']))
        	$tmp->error($result['error']);
        
        $tmp->add(self::TMP_DIR.$result['filename']);
        
        header("Content-Type: text/plain");
        $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $result;
        Yii::app()->end();
	}
	
	protected function files()
	{			
		if(isset($_POST['id']))
		    $this->deleteFile();
		$uploaded=TmpUploads::model()->findByKey($_POST['key']);
		$this->getController()->renderPartial('application.views.upload.files',array('files'=>$uploaded),false,true);		
	}
	
	protected function deleteFile()
	{
		$file=TmpUploads::model()->findByPk($_POST['id']);
		if ($file && $file->userId==Yii::app()->user->id && $file->key==$_POST['key'])
			$file->delete();
	}
}