<?php

App::uses('UserminAppController', 'Usermin.Controller');

/**
 * Umusers Controller
 *
 * @property Umuser $Umuser
 */
class UmusersController extends UserminAppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout', 'loggedout', 'reset_password');
    }

    public function login() {
        //debug('in umusers.login');
        if ($this->request -> isPost()) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function loggedout() {
        //do nothing
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Umuser->recursive = 0;
        $this->set('umusers', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Umuser->id = $id;
        if (!$this->Umuser->exists()) {
            throw new NotFoundException(__('Invalid umuser'));
        }
        $this->set('umuser', $this->Umuser->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Umuser->create();
            if ($this->Umuser->save($this->request->data)) {
                $this->Session->setFlash(__('The umuser has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The umuser could not be saved. Please, try again.'));
            }
        }
        $umroles = $this->Umuser->Umrole->find('list');
        $this->set(compact('umroles'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Umuser->id = $id;
        if (!$this->Umuser->exists()) {
            throw new NotFoundException(__('Invalid umuser'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            // leave password untouched if not modified
            $this->log($this->request->data);
            if ($this->request->data['Umuser']['password'] == ''){
                unset($this->request->data['Umuser']['password']);
            }
            if ($this->Umuser->save($this->request->data)) {
                $this->Session->setFlash(__('The umuser has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The umuser could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Umuser->read(null, $id);
        }
        $umroles = $this->Umuser->Umrole->find('list');
        $this->set(compact('umroles'));
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
        $this->Umuser->id = $id;
        if (!$this->Umuser->exists()) {
            throw new NotFoundException(__('Invalid umuser'));
        }
        if ($this->Umuser->delete()) {
            $this->Session->setFlash(__('Umuser deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Umuser was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function reset_password(){
      if( isset( $this->request->data["Umuser"]["email"] ) ){
        $email= $this->request->data["Umuser"]["email"];

        try{
          $this->Umuser->reset_password( $email );
          $this->Session->setFlash(__('To initiate the reset proccess. please follow the instruction sent it to your email account'));

          $this->redirect(array('action' => 'login'), null, false);
          return 'redirect to Login';

        }catch(NoEmailException $error){
          error_log( get_class( $error ) );
          $this->Session->setFlash(__('Please Enter a Valid Email'));

        }catch(NoUserFound $error){
          error_log( get_class( $error ) );
          $this->Session->setFlash(__('The Email Was Not Found'));
        }

      }
    }



}
