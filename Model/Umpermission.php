<?php

App::uses('UserminAppModel', 'Usermin.Model');

/**
 * Umpermission Model
 *
 * @property Umrole $Umrole
 * @property Umuser $Umuser
 */
class Umpermission extends UserminAppModel {
    
    const cacheKeyPrefix = 'UmpermissionsForUserRole_';
    
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

    /**
     * Cleanning the rules cache on every save see class RoleAuthorize for cache using
     * @return type 
     */
    public function afterSave() {
        if (isset($this->data[$this->alias]['umrole_id'])) {
            Cache::delete(self::cacheKeyPrefix . $this->data[$this->alias]['umrole_id']);
        }
        return true;
    }

}
