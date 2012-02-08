<?php
/* UserminUser Fixture generated on: 2011-11-16 21:40:55 : 1321476055 */

/**
 * UserminUserFixture
 *
 */
class UserminUserFixture extends CakeTestFixture {

  /**
   * Fields
   *
   * @var array
   */
  public $fields = array(
    'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '	', 'charset' => 'latin1'),
    'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
    'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
    'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
    'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
  );

  /**
   * Records
   *
   * @var array
   */
  public $records = array(
    array(
      'id' => '4ec41fd7-37bc-417f-8ee5-2454bd16a67e',
      'username' => 'test user',
      'email' => 'test@test.com',
      'password' => '23545234002'
    ),
  );
}
