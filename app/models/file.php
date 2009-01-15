<?php 
class FileList extends AppModel {

	var $name = 'FileList';
	var $useTable = "files";

	function findByPath ($path, $name) {
		return $this->find("name = '$name' and path = '$path'");
	}

}
?>