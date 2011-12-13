<?php

App::uses('AppShell', 'Console/Command');
App::uses('Model', 'Model');

class UserminShell extends AppShell {

    public $uses = array('Usermin.Umuser', 'Usermin.Umrole', 'Usermin.Umpermission');

    public function main() {
        $this->out('Usermin shell');
    }

    public function init() {
        // ignoring Auth
        App::uses('AuthComponent', 'Controller/Component');
        $this->Auth = new AuthComponent(new ComponentCollection());

        $this->out('checking superadmin role and user');
        $superadmin = 'superadmin';
        $this->hr();
        // checking superadmin role
        $role = $this->Umrole->findByName($superadmin);
        if (!$role) {
            $this->out('creating superadmin role');
            $superadminRole = array('name' => 'superadmin', 'rank' => 1);
            $this->Umrole->create();
            if ($this->Umrole->save($superadminRole)) {
                $this->out('superadmin role created');
            } else {
                $this->out('superadmin could not be created, exitting');
                return false;
            }
        } else {
            $this->out('superadmin role exists');
        }

        // checking for a "superadmin" user
        $user = $this->Umuser->findByUsername($superadmin);
        if (!$user) {
            $this->out('creating superadmin user');
            $role = $this->Umrole->findByName($superadmin);
            $umroleid = $role['Umrole']['id'];
            $superadminUser = array('username' => 'superadmin', 'email' => 'thisemaildoesnotexist@domaindoesnotexst.com', 'password' => '1234', 'umrole_id' => $umroleid);
            $this->Umuser->create();
            if ($this->Umuser->save($superadminUser)) {
                $this->out('superadmin user created');
                $this->out('<info>all done. Now you have a superadmin user and a superadmin role</info>');
                $this->out('<info>username: superadmin</info>');
                $this->out('<info>password: 1234  <-- CHANGE THIS DEFAULT USER PASSWORD ASAP</info>');
            } else {
                $this->out('superadmin user could not be created, exitting');
                return false;
            }
        } else {
            $this->out('superadmin user exists');
        }
    }

    public function getOptionParser() {
        $parser = parent::getOptionParser();
        return $parser->description(
                        __d('usermin', 'Usermin shell helps you to initialize your Usermin authentication system')
                )->addSubcommand('init', array(
                    'help' => __d('usermin', 'Check and create if not exists a superadmin user and role. Superadmin is allowed to do everything')
                ));
    }

}