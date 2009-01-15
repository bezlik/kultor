<?php
	class UploadsController extends AppController {
		
		var $uses = array("files");
		
		function uploadavatar()
		{
			$this->layout="clear";
		}
	}
?>