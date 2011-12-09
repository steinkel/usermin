<?php
App::uses('BaseAuthorize', 'Controller/Component/Auth');
App::uses('Umpermission', 'Usermin.Model');

class RoleAuthorize extends BaseAuthorize {
    
   public function authorize($user, CakeRequest $request) {
       $this->_debug($user);
       $this->_debug($request);
       
       $actionRequested = Router::parse($request->here(false));
       $this->_debug($actionRequested);
       
       // get permissions for the role
       $Umpermission = new Umpermission();
       $conditions = array('conditions' => array('umrole_id' => $user['umrole_id']));
       $permissionsForUserRole = $Umpermission->find('all', $conditions);
       $this->_debug($permissionsForUserRole);
       return true;
       $isAuthorized = false;
       
       //this should be optimized (tree or cache)
       foreach ($permissionsForUserRole as $perm){

           // strict validation, not using * yet
           if($actionRequested['plugin'] === $perm['Umpermission']['plugin'] && $actionRequested['controller'] === $perm['Umpermission']['controller'] && $actionRequested['action'] === $perm['Umpermission']['action']){
               return ($perm['Umpermission']['allowed'] === 1);
           }
       }
       
       
       return $isAuthorized;
   }
   
   private function _debug($var){
       if (isset($this->settings['debug']) && $this->settings['debug']){
           debug($var);
       }
   }
}