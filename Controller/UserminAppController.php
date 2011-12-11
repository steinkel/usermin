<?php

class UserminAppController extends AppController {
    public function beforeFilter(){
        Configure::load('Usermin.usermin');
    }

}

