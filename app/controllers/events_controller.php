<?php
class EventsController extends AppController {

	var $name = 'Events';
	var $helpers = array('Html', 'Form', 'Javascript','comments');
	var $components = array('json');
	var $uses = array("Event","Place","City");
	
	function beforeFilter(){
		    $this->Auth->allow(array('index','fresh'));
		    $this->set('user',$this->Auth->user());
		    Configure::write("kultor.user_id",$this->Auth->user('id'));
	}

	function ajax() {
        if ($this->RequestHandler->isAjax() && $this->RequestHandler->isGet()) {		
        		$this->layout="ajax";				
				@$q = trim(htmlspecialchars($_GET['q']));
				if ($q == "") return;	
				$data  = $this->Place->find("list",array("conditions"=>array("city_id"=>$q)));				
				$this->set("data",$this->json->encode($data));
				Configure::write("debug",0);									
		} else {
				$this->redirect("/events");
		}
		
	}
	
	function fresh() {
		
		$result = $this->Event->findAll("`event_date`>".time());
		return $result;
	}
	
	function index() {	
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Event', true), array('action'=>'index'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}
	

	function add() {
			
		if (!empty($this->data)) {
			
			print_r($this->data);
			die();
			$this->data['Event']['user_id'] = $this->Auth->user('id');			
			
			$this->Event->create();
			if ($this->Event->save($this->data))
				$this->flash(__('Event saved.', true), array('action'=>'index'));					
			}		
					
		$places = $this->Event->Place->find('list',array('name','conditions'=>array('city_id'=>Configure::read('kultor.defaultCity'))));
		$this->set(compact('places'));

		$cities = $this->City->findNonEmpty();
		$this->set(compact('cities'));
		
		$this->set('city',Configure::read('kultor.defaultCity'));		

	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Event', true), array('action'=>'index'));
			$this->stop();
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->flash(__('The Event has been saved.', true), array('action'=>'index'));				
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}

		$places = $this->Event->Place->find('list',array('name','conditions'=>array('city_id'=>Configure::read('kultor.defaultCity'))));
		$this->set(compact('places'));

		$cities = $this->City->findNonEmpty();
		$this->set(compact('cities'));
		
		$this->set('city',Configure::read('kultor.defaultCity'));		

	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Event', true), array('action'=>'index'));
		}
		if ($this->Event->del($id)) {
			$this->flash(__('Event deleted', true), array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Event', true), array('action'=>'index'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->flash(__('Event saved.', true), array('action'=>'index'));
				$this->stop();
			} else {
			}
		}
		$users = $this->Event->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Event', true), array('action'=>'index'));
			$this->stop();
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->flash(__('The Event has been saved.', true), array('action'=>'index'));
				$this->stop();
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$users = $this->Event->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Event', true), array('action'=>'index'));
		}
		if ($this->Event->del($id)) {
			$this->flash(__('Event deleted', true), array('action'=>'index'));
		}
	}

}
?>