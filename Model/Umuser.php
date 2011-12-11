<?php

App::uses('UserminAppModel', 'Usermin.Model');
App::uses('CakeEmail', 'Network/Email');

/**
 * Umuser Model
 *
 * @property Umrole $Umrole
 * @property Umpermission $Umpermission
 */
class Umuser extends UserminAppModel {

    public function beforeSave() {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    var $validate = array(
        "username" => array(
            'mustUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'That username is already taken.'),
            'mustBeLonger' => array(
                'rule' => array('minLength', 3),
                'message' => 'Username is required and must have a minimum of 3 alphanumeric characters.',
                'last' => true),
        ),
        'email' => array(
            'mustBeEmail' => array(
// code borrowed from here http://fightingforalostcause.net/misc/2006/compare-email-regex.php
// thanks to James Watts and Francisco Jose Martin Moreno
                'rule' => '/^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i',
// end of borrowed code
                'message' => 'Please supply a valid email address.',
                'last' => true),
            'mustUnique' => array(
                'rule' => 'isUnique',
                'message' => 'That email is already registered.',
            )
        ),
        'confirm_password' => array(
            'mustBeLonger' => array(
                'rule' => array('minLength', 4),
                'message' => 'Your password is too short, please provide 4 characters minimum.',
            ),
            'mustMatch' => array(
                'rule' => array('verifies', 'password'),
                'message' => 'You must fill in the password field and must match with confirm.'
            )
        ),
        'captcha' => array(
            'rule' => 'notEmpty',
            'message' => 'This field cannot be left blank'
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Umrole' => array(
            'className' => 'Umrole',
            'foreignKey' => 'umrole_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function afterSave($created) {
        if ($created && Configure::read('Usermin.sendEmailAfterUserCreated')) {
            // send email to newly created user
            $email = new CakeEmail();
            $fromConfig = Configure::read('Usermin.emailFrom');
            $fromNameConfig = Configure::read('Usermin.emailFromName');
            $email->from(array( $fromConfig => $fromNameConfig));
            $email->sender(array( $fromConfig => $fromNameConfig));
            $email->to($this->data['Umuser']['email']);
            $email->subject('New user created');
            //$email->transport('Debug');
            try{
            $result = $email->send('Username: ' . $this->data['Umuser']['username']);
            } catch (Exception $ex){
                // we could not send the email, ignore it
            }
            $this->log($result, LOG_DEBUG);
        }
    }

}
