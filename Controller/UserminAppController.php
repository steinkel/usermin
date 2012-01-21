<?php

class UserminAppController extends AppController {

	public $components = array('Session');	

	public function beforeFilter(){
		Configure::load('Usermin.usermin');
	}
}
