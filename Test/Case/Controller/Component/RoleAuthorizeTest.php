<?php

App::uses('Controller', 'Controller');
App::uses('RoleAuthorize', 'Usermin.Controller/Component/Auth');
App::uses('Router', 'Routing');

class RoleAuthorizeTest extends CakeTestCase {

    public function setUp() {
        parent::setUp();

        $this->controller = $this->getMock('Controller');
        $this->components = $this->getMock('ComponentCollection');
        $this->components->expects($this->any())
                ->method('getController')
                ->will($this->returnValue($this->controller));

        $this->auth = new RoleAuthorize($this->components);
        
        // loading your application routes
        require APP . 'Config' . DS . 'routes.php';
    }

    /**
     *
     * @expectedException CakeException
     */
    public function testControllerTypeError() {
        $this->auth->controller(new StdClass());
    }

    /**
     * test failure
     *
     * @return void
     */
    public function testAuthorizeFailureNoUserOrGroup() {
        $user = array();
        
        $request = new CakeRequest('/notauthorized/index');
        
        //debug(Router::parse($request->here(false)));
        
        $this->assertFalse($this->auth->authorize($user, $request));

        $user = array('username' => 'unauthorized');
        $this->assertFalse($this->auth->authorize($user, $request));

        $user = array('umrole_id' => 'groupidnotexists');
        $this->assertFalse($this->auth->authorize($user, $request));

        $user = array('username' => 'unauthorized', 'umrole_id' => 'groupidnotexists');
        $this->assertFalse($this->auth->authorize($user, $request));
    }
    
   /* public function testAuthorizeSuccess(){
        
    }*/
    
    

}