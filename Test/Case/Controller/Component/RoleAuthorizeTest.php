<?php

App::uses('Controller', 'Controller');
App::uses('RoleAuthorize', 'Usermin.Controller/Component/Auth');
App::uses('Router', 'Routing');

class RoleAuthorizeTest extends CakeTestCase {

    public $fixtures = array('plugin.usermin.umuser', 'plugin.usermin.umpermission', 'plugin.usermin.umrole');

    public function setUp() {
        parent::setUp();

        // cache will not be tested
        Configure::write('Cache.disable', true);

        $this->controller = $this->getMock('Controller');
        $this->components = $this->getMock('ComponentCollection');
        $this->components->expects($this->any())
                ->method('getController')
                ->will($this->returnValue($this->controller));

        $this->auth = new RoleAuthorize($this->components, array('debug' => true, 'authorizeAll' => false));

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

    public function testAuthorizeSuccess() {
        $user = array('username' => 'user-0', 'umrole_id' => '00000000-0000-0000-0000-000000000000');
        $request = new CakeRequest('/controllerauthorized/actionauthorized');
        $this->assertTrue($this->auth->authorize($user, $request));
    }

    public function testAuthorizeFailureWrongRoute() {
        $user = array('username' => 'user-0', 'umrole_id' => '00000000-0000-0000-0000-000000000000');

        $request = new CakeRequest('/othercontroller/otheraction');
        $this->assertFalse($this->auth->authorize($user, $request));

        $request = new CakeRequest('/controllerauthorized/otheraction');
        $this->assertFalse($this->auth->authorize($user, $request));

        $request = new CakeRequest('/othercontroller/actionauthorized');
        $this->assertFalse($this->auth->authorize($user, $request));

        $request = new CakeRequest('/otherplugin/controllerauthorized/actionauthorized');
        $this->assertFalse($this->auth->authorize($user, $request));

        $request = new CakeRequest(null);
        $this->assertFalse($this->auth->authorize($user, $request));
    }

    public function testSuperadminIsAuthorized() {
        $user = array('username' => 'superadmin', 'umrole_id' => 'nogroup');
        $request = new CakeRequest('/othercontroller/otheraction');
        $this->assertTrue($this->auth->authorize($user, $request));
    }

    public function testSettingsAuthorizeAllIsAuthorized() {
        $user = array('username' => 'otheruser', 'umrole_id' => 'nogroup');
        $request = new CakeRequest('/othercontroller/otheraction');

        $this->auth = new RoleAuthorize($this->components, array('debug' => true, 'authorizeAll' => true));

        $this->assertTrue($this->auth->authorize($user, $request));
    }

    public function testAuthorizeFailureNotAllowed() {
        $user = array('username' => 'user-0', 'umrole_id' => '00000000-0000-0000-0000-000000000000');

        $request = new CakeRequest('/controllernotallowed/actionnotallowed');
        $this->assertFalse($this->auth->authorize($user, $request));
    }

    //TODO: Tests to cover '*' rules    
    //TODO: Tests to cover not authorized roles
}