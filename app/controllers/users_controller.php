<?php
class UsersController extends AppController {
    var $name = 'Users';
	var $helpers = array("form");
    var $scaffold;
    function login(){}
    function logout(){
        $this->Session->del('Permissions');
        $this->redirect($this->Auth->logout());
    }
    
    
	function settings (){
		
		if (!empty($this->data)) {
			$this->User->create();

			$this->data['User']['id'] = $this->Auth->user('id');
			
			if ($this->data['User']['password'] != '' )
				$this->data['User']['password'] = $this->Auth->password($this->data['User']['password'] );
			else
				unset($this->data['User']['password']);
				
			
			if ( $this->data['User']['file']['name'])
				if (!$this->Uploader->uploadAvatar($this->data))
					{
						$this->Session->setFlash($this->Uploader->message);
						$this->redirect(array('action'=>'settings'));
					}
			
			if ($this->User->save($this->data)) {
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Settings could not be saved. Please, try again.', true));
			}
		} else 
		{
		 $this->data = $this->User->findById($this->Auth->user('id'));	
		 
		 unset($this->data['User']['password']);
		}
	}

	function register() {
		
		
		if (!empty($this->data)) {
			$this->data['User']['register_date']=time();
			$this->User->create();
			
			if ($this->User->save($this->data)) {
		
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
	}

}
?>