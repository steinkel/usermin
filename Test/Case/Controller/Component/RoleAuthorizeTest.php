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
    public function testAuthorizeFailureNoUser() {
        $user = array();
        $request = new CakeRequest('/usermintestgoingtofail/index', false);
        $this->assertFalse($this->auth->authorize($user, $request));

        $user = array('username' => 'unauthorized');
        $this->assertFalse($this->auth->authorize($user, $request));

        $user = array('umrole_id' => 'groupidnotexists');
        $this->assertFalse($this->auth->authorize($user, $request));
/*
        $user = array('username' => 'unauthorized', 'umrole_id' => 'groupidnotexists');
        $this->assertFalse($this->auth->authorize($user, $request));
 */
    }

}