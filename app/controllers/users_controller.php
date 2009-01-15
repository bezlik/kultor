<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form','javascript');
	var $components = array('Auth','Uploader','Cookie');

	function beforeFilter(){

		    $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		    $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
		    $this->Auth->allow(array('display','register','index','view'));
		    $this->Auth->fields['username']='login';
		    $this->Auth->authorize = 'controller';
		    $this->set('user',$this->Auth->user());
	}

 

      
         
         
	function settings ()
	{
		
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
 	 
	
	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	
	
	function login() {
	//-- code inside this function will execute only when autoRedirect was set to false (i.e. in a beforeFilter).
	if ($this->Auth->user()) {
		if (!empty($this->data) && $this->data['User']['remember_me']) {
			$cookie = array();
			$cookie['username'] = $this->data['User']['username'];
			$cookie['password'] = $this->data['User']['password'];
			$this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
			unset($this->data['User']['remember_me']);
		}
		$this->redirect($this->Auth->redirect());
	}
	if (empty($this->data)) {
		$cookie = $this->Cookie->read('Auth.User');
		if (!is_null($cookie)) {
			if ($this->Auth->login($cookie)) {
				//  Clear auth message, just in case we use it.
				$this->Session->del('Message.auth');
				$this->redirect($this->Auth->redirect());
			} else { // Delete invalid Cookie
				$this->Cookie->del('Auth.User');
			}
		}
	   }
	}
	
	
      function logout() {

              $this->Session->setFlash("Возвращайтесь еще! :)");
              $this->redirect($this->Auth->logout());
              $this->Cookie->del('Auth.User'); 
          }

	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array('action'=>'index'));
		}
		$avatar  = $this->Uploader->getAvatar($id);
		if (isset($avatar[0]))
			{
				$avatar = $avatar[0]['FileList']['id'].strtolower(strrchr($avatar['0']['FileList']['name'],"."));
				
			} else
			{
				$avatar = "blank.jpg";
			}
			
			$this->set('avatar', $avatar);
			
		$this->set('user_info', $this->User->read(null, $id));
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




	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>