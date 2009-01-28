<?php
class MiscController extends AppController {
	
	var $uses = array();
	var $name = "Misc";
	

	function goHome($where) {
		$this->redirect('/',null,true);
	}
	

}

?>