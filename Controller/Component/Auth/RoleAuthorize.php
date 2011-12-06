<?php
App::uses('BaseAuthorize', 'Controller/Component/Auth');

class RoleAuthorize extends BaseAuthorize {
   public function authorize($user, CakeRequest $request) {
       debug($user);
        // Do things for ldap here.
       return true;
   }
}