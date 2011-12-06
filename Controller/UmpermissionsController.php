<?php
App::uses('UserminAppController', 'Controller');
/**
 * Umpermissions Controller
 *
 * @property Umpermission $Umpermission
 */
class UmpermissionsController extends UserminAppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Umpermission->recursive = 0;
		$this->set('umpermissions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Umpermission->id = $id;
		if (!$this->Umpermission->exists()) {
			throw new NotFoundException(__('Invalid umpermission'));
		}
		$this->set('umpermission', $this->Umpermission->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Umpermission->create();
			if ($this->Umpermission->save($this->request->data)) {
				$this->Session->setFlash(__('The umpermission has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The umpermission could not be saved. Please, try again.'));
			}
		}
		$umroles = $this->Umpermission->Umrole->find('list');
		$umusers = $this->Umpermission->Umuser->find('list');
		$this->set(compact('umroles', 'umusers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Umpermission->id = $id;
		if (!$this->Umpermission->exists()) {
			throw new NotFoundException(__('Invalid umpermission'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Umpermission->save($this->request->data)) {
				$this->Session->setFlash(__('The umpermission has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The umpermission could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Umpermission->read(null, $id);
		}
		$umroles = $this->Umpermission->Umrole->find('list');
		$umusers = $this->Umpermission->Umuser->find('list');
		$this->set(compact('umroles', 'umusers'));
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
		$this->Umpermission->id = $id;
		if (!$this->Umpermission->exists()) {
			throw new NotFoundException(__('Invalid umpermission'));
		}
		if ($this->Umpermission->delete()) {
			$this->Session->setFlash(__('Umpermission deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Umpermission was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
