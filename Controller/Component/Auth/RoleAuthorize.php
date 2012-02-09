<?php

App::uses('BaseAuthorize', 'Controller/Component/Auth');
App::uses('Umpermission', 'Usermin.Model');

class RoleAuthorize extends BaseAuthorize {

    /**
     * Checks if a Permission matching plugin, controller and
     * action exists and is allowed to access for the user's
     * role.
     * 'superadmin' user is always authorized
     * 
     * @param type $user
     * @param CakeRequest $request
     * @return type 
     */
    public function authorize($user, CakeRequest $request) {
        if (isset($this->settings['authorizeAll']) && $this->settings['authorizeAll']) {
            return true;
        }
        
        if (!isset($user['username']) || !isset($user['umrole_id'])){
            $this->_log('No username or role was defined, so you are not authorized');
            return false;
        }

        if ($user['username'] == 'superadmin') {
            // superadmin user is cool
            return true;
        }

        $actionRequested = Router::parse($request->here(false));

        $this->_log("user: ${user['username']} is trying to access: p(${actionRequested['plugin']}) c(${actionRequested['controller']}) a(${actionRequested['action']}) ");

        // get permissions for the role
        $conditions = array('conditions' => array('umrole_id' => $user['umrole_id']));
        $permissionsForUserRole = Cache::read(Umpermission::cacheKeyPrefix . $user['umrole_id']);
        if ($permissionsForUserRole === false) {
            $Umpermission = new Umpermission();
            $permissionsForUserRole = $Umpermission->find('all', $conditions);
            Cache::write(Umpermission::cacheKeyPrefix . $user['umrole_id'], $permissionsForUserRole);
            $this->_log("Caching rules for umrole_id ${user['umrole_id']}");
        } else {
            $this->_log("Getting cached rules for umrole_id ${user['umrole_id']}");
            //$this->_log(print_r($permissionsForUserRole, true));
        }

        foreach ($permissionsForUserRole as $perm) {
            $this->_log("checking permission " . $perm['Umpermission']['id'] . ' = p(' . $perm['Umpermission']['plugin'] . ') c(' . $perm['Umpermission']['controller'] . ') a(' . $perm['Umpermission']['action'] . ')');
            if ($perm['Umpermission']['plugin'] == '*' || (strtoupper($actionRequested['plugin']) == strtoupper($perm['Umpermission']['plugin'])) &&
                    $perm['Umpermission']['controller'] == '*' || (strtoupper($actionRequested['controller']) == strtoupper($perm['Umpermission']['controller'])) &&
                    $perm['Umpermission']['action'] == '*' || (strtoupper($actionRequested['action']) == strtoupper($perm['Umpermission']['action']))) {
                $this->_log("permission matches, returning true if allowed");
                return ($perm['Umpermission']['allowed'] == 1);
            }
        }
        $this->_log("no rules matched. user is not allowed ");

        return false;
    }

    /**
     * Filter debug
     *
     * @param type $var 
     */
    private function _log($var) {
        if (isset($this->settings['debug']) && $this->settings['debug']) {
            $this->controller()->log($var, LOG_DEBUG);
        }
    }

}