<?php
/* Umuser Fixture generated on: 2011-11-16 21:46:42 : 1321476402 */

/**
 * UmuserFixture
 *
 */
class UmuserFixture extends CakeTestFixture {
  public  $name= "Umuser";
  public $import = 'Umuser';
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
    'reset_password' => array('type'=>"boolean"),
    'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
  );

  /**
   * Records
   *
   * @var array
   */
  public $records = array(
    array(
      'id' => '4ec42132-9514-42ab-abff-24c3bd16a67e',
      'username' => 'Lorem ipsum dolor sit amet',
      'email' => 'test@test.com',
      'password' => 'Lorem ipsum dolor sit amet',
      'token_password' => ""
    ),
  );
}
