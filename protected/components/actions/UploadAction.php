<?php
class UploadAction extends CAction
{
	const TMP_DIR='/tmpUploads/';
	public $single=true;
	
	public function run()
	{
		if(!isset($_POST['key']))
			return;
		if(isset($_POST['PHPSESSID']))
		{
			$this->upload();
			echo "1";
		}
		else
			$this->files();
	}
	
	protected function upload()
	{
		file_put_contents($_SERVER['DOCUMENT_ROOT'].'/test.txt', 'work');
		Yii::app()->session->close();
		Yii::app()->session->sessionID = $_POST['PHPSESSID'];
		Yii::app()->session->open();
		
		$key=$_POST['key'];
		$tmp=new TmpUploads();
		$tmp->key=$key;
		
		$tmp->deleteUsersUploads($this->single);

		if(!ini_get('file_uploads'))
		{
			$tmp->error('Загрузка файлов запрещена настройками сервера');
			return;
		}
		if(!isset($_FILES['Filedata']) || !is_uploaded_file($_FILES['Filedata']['tmp_name']))
		{
			$tmp->error('Файл не был загружен');
			return;
		}
		
		$realName=$_FILES['Filedata']['name'];
		$arr=explode('.',$realName);
		$filename=md5($realName.$key).'.'.$arr[1];	
		$filePath=self::TMP_DIR.$filename;
		
		if(!move_uploaded_file($_FILES['Filedata']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$filePath))
		{
			$tmp->error('Не удалось переместить файл во временную директорию');
			return;
		}
		
		$tmp->add($filePath);
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