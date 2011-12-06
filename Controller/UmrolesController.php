<?php
App::uses('UserminAppController', 'Controller');
/**
 * Umroles Controller
 *
 * @property Umrole $Umrole
 */
class UmrolesController extends UserminAppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Umrole->recursive = 0;
		$this->set('umroles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Umrole->id = $id;
		if (!$this->Umrole->exists()) {
			throw new NotFoundException(__('Invalid umrole'));
		}
		$this->set('umrole', $this->Umrole->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Umrole->create();
			if ($this->Umrole->save($this->request->data)) {
				$this->Session->setFlash(__('The umrole has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The umrole could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Umrole->id = $id;
		if (!$this->Umrole->exists()) {
			throw new NotFoundException(__('Invalid umrole'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Umrole->save($this->request->data)) {
				$this->Session->setFlash(__('The umrole has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The umrole could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Umrole->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Umrole->id = $id;
		if (!$this->Umrole->exists()) {
			throw new NotFoundException(__('Invalid umrole'));
		}
		if ($this->Umrole->delete()) {
			$this->Session->setFlash(__('Umrole deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Umrole was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
