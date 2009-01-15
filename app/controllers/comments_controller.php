<?

class CommentsController extends AppController {
	var $name = "Comments"; 
	
	var $uses = array("comment");
	
	function add() {
	
		if (!empty($this->data)) {
			
			$this->data['comment']['user_id'] = $this->Auth->user('id');
			$this->data['comment']['comment_date'] = time();
			
			
			$this->comment->create();
			if ($this->comment->save($this->data)) {

				$this->flash(__('Comment saved.', true), array('action'=>'index'));



			} else {
				
			}
		} 
			
			
	}
	
	
	function getComments($page=null) {
		if ($page==null) return 0;
		
		return $this->comment->findAll(array("comment_to"=>$page));
	}
}
?>