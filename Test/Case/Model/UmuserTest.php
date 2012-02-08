<?php
App::uses("Umuser", "plugin/Model");
App::import("Model", "Usermin.Umuser");
/**
 *
 **/
class UmuserTest extends CakeTestCase{
  public $fixtures =array("plugin.usermin.umuser");

  public function setUp(){
    $this->Umuser=& ClassRegistry::init("Umuser");
  }

  public function test_it_should_reset_user_password(){
    $email= "test@test.com";
    $this->Umuser->reset_password( $email );
    $user_changed= $this->Umuser->find("first", array(
      "email"=> $email
    ));
    $password=  crypt( $email, Configure::read("Security.salt") );

    $this->assertEquals( $user_changed["Umuser"]["token_password"], $password);
  }

  public function test_it_should_send_error_if_email_is_null(){
    try{
      $this->Umuser->reset_password();
    }catch(Exception $exception){
      $this->assertInstanceOf( "NoEmailException", $exception );
    }
  }

  public function test_it_should_send_error_if_email_is_empty(){
    try{
      $this->Umuser->reset_password("");
    }catch(Exception $exception){
      $this->assertInstanceOf( "NoEmailException", $exception );
    }
  }


  public function test_it_should_send_error_if_email_not_exist(){
    try{
      $email= "testFail@tet.com";
      $this->Umuser->reset_password( $email );
    }catch(Exception $exception){
      $this->assertInstanceOf( "NoUserFound", $exception );
    }
  }


}


?>
