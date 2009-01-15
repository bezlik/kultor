<?php 

class UploaderComponent extends Object {
var $uses = array('Files');
var $message = '';

	function getAvatar($id=null)
	{
		
		if ($id==null) return "blank.jpg";
		
		$Model =& ClassRegistry::init('FileList'); 
		return $Model->findAll(array('type'=>'avatar','owner'=>$id));
	}
	
	
function uploadAvatar($data)
 {
	if ($this->genericUpload($data,'avatar')) { 
			$Model =& ClassRegistry::init('FileList'); 
			$files = $Model->findAll(array('type'=>'avatar','owner'=>$data['User']['id']));
			$target_path = "files/upload/avatar/";		
			foreach($files as $file)
			{			
				if($file['FileList']['id']==$Model->id) continue;				
				$ext = strtolower(strrchr($file['FileList']['name'],"."));				
				unlink($target_path.$file['FileList']['id'].$ext);
				
			}
			//@todo: fix that
			$Model->query("delete from ".$Model->table." where type='avatar' and owner='{$data['User']['id']}' and id<>'{$Model->id}'");
		
	}
 }
 
 function genericUpload($data,$type) {
		if (empty($data)) return false;
		$target_path = "files/upload/{$type}/";
		
		$data['FileList']['name'] = $data['User']['file']['name'];
		$data['FileList']['owner'] = $data['User']['id'];
		$data['FileList']['type'] = "{$type}";
		$Model =& ClassRegistry::init('FileList'); 
		$uploadext = strtolower(strrchr($data['User']['file']['name'],"."));
		
		if ($uploadext!='.jpg' && $uploadext!='.jpeg' && $uploadext!='.png' && $uploadext!='.gif')
			 {
			 	$this->message = __("Пожалуйста, используйте файлы png, jpg и gif");
			 	return false;
			 }
		
	
		$Model->save($data);
		$new_target_path = $target_path . basename( $Model->id.$uploadext); 
		
		if(move_uploaded_file($data['User']['file']['tmp_name'], $new_target_path)) {
			return true;    
		} else{		
			$Model->deleteAll(array('id'=>$Model->id));
			return false;
		}
		
		
 }

}
?>