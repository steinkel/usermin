<?php
/* Umuser Fixture generated on: 2012-02-10 21:52:58 : 1328907178 */

/**
 * UmuserFixture
 *
 */
class UmuserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'umrole_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '00000000-0000-0000-0000-000000000000',
			'username' => 'user-0',
			'email' => 'user0@example.com',
			'password' => 'this-should-be-encripted',
			'umrole_id' => '00000000-0000-0000-0000-000000000000'
		),
                array(
			'id' => '11111111-1111-1111-1111-111111111111',
			'username' => 'user-1',
			'email' => 'user1@example.com',
			'password' => 'this-should-be-encripted',
			'umrole_id' => '11111111-1111-1111-111111111111'
                )
	);
}
