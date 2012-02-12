<?php

/* Umpermission Fixture generated on: 2012-02-10 21:52:50 : 1328907170 */

/**
 * UmpermissionFixture
 *
 */
class UmpermissionFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
        'umrole_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
        'umuser_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
        'plugin' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
        'controller' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
        'action' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
        'params' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
        'allowed' => array('type' => 'boolean', 'null' => true, 'default' => '1', 'collate' => NULL, 'comment' => ''),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
        'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        // group-0 allowed to /controllerauthorized/actionauthorized
        array(
            'id' => '00000000-0000-0000-0000-000000000000',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => '',
            'controller' => 'controllerauthorized',
            'action' => 'actionauthorized',
            'params' => '',
            'allowed' => 1
        ),
        // group-0 NOT allowed to /controllernotallowed/actionnotallowed
        array(
            'id' => '11111111-1111-1111-1111-111111111111',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => '',
            'controller' => 'controllernotallowed',
            'action' => 'actionnotallowed',
            'params' => '',
            'allowed' => 0
        ),
        // permission for plugin usermin
        array(
            'id' => '22222222-2222-2222-2222-222222222222',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => 'usermin',
            'controller' => 'controllerauthorizedonlyinsideplugin',
            'action' => 'actionauthorizedonlyinsideplugin',
            'params' => '',
            'allowed' => 1
        ),
        // asterisk permissions - plugin
        array(
            'id' => '33333333-3333-3333-3333-333333333333',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => '*',
            'controller' => 'controllerauthorizedineveryplugin',
            'action' => 'actionauthorizedineveryplugin',
            'params' => '',
            'allowed' => 1
        ),
        array(
            'id' => '44444444-4444-4444-4444-444444444444',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => '*',
            'controller' => 'controllerdeniedineveryplugin',
            'action' => 'actiondeniedineveryplugin',
            'params' => '',
            'allowed' => 0
        ),
        // asterisk permissions - controller
        array(
            'id' => '55555555-5555-5555-5555-555555555555',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => '',
            'controller' => '*',
            'action' => 'actionauthorizedineverycontroller',
            'params' => '',
            'allowed' => 1
        ),
        array(
            'id' => '66666666-6666-6666-6666-666666666666',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => '',
            'controller' => '*',
            'action' => 'actiondeniedineverycontroller',
            'params' => '',
            'allowed' => 0
        ),
        // asterisk permissions - action
        array(
            'id' => '77777777-7777-7777-7777-777777777777',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => '',
            'controller' => 'controllerallactionsauthorized',
            'action' => '*',
            'params' => '',
            'allowed' => 1
        ),
        array(
            'id' => '88888888-8888-8888-8888-888888888888',
            'umrole_id' => '00000000-0000-0000-0000-000000000000',
            'umuser_id' => 'not-used',
            'plugin' => '',
            'controller' => 'controllerallactionsdenied',
            'action' => '*',
            'params' => '',
            'allowed' => 0
        ),
    );

}
