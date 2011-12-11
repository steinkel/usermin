<?php

App::uses('UserminAppController', 'Usermin.Controller');

/**
 * Dashboard for user management
 */
class UmdashboardController extends UserminAppController {

    var $uses = array('Usermin.Umuser', 'Usermin.Umpermission', 'Usermin.Umrole');
    public function index() {
        
        $this->set('umusersCount', $this->Umuser->find('count'));
        $this->set('umpermissionsCount', $this->Umpermission->find('count'));
        $this->set('umroles', $this->Umrole->find('all'));
    }

}
