<?php
class PlacesController extends AppController {

	var $name = 'Places';
	var $helpers = array('Html', 'Form', 'Javascript', 'Html');

	function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Place.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('place', $this->Place->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Place->create();
			if ($this->Place->save($this->data)) {
				$this->Session->setFlash(__('The Place has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Place could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Place->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Place', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->data['Place']['id']='';
			if ($this->Place->save($this->data)) {
				$this->Session->setFlash(__('The Place has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Place could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Place->read(null, $id);
		}
		$users = $this->Place->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Place', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Place->del($id)) {
			$this->Session->setFlash(__('Place deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>