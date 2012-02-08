<?php
App::uses("Controller", "Plugin/Controller");
App::uses("View", "Plugin/View");
App::import("Model", "Usermin.Umuser");

/**
 *
 **/
class UmusersControllerTest extends ControllerTestCase{
  public $fixtures = array('plugin.usermin.umuser');

  public function setUp(){
    $this->Umuser=& ClassRegistry::init("Umuser");
    $_ENV["enviroment"]="test";
  }


  public function test_it_should_show_form_if_dont_have_email_data(){
    $view= $this->testAction("/reset_password",
      array("method"=>"get", "return"=>"view"));


    $this->assertRegExp("/reset_password/", $view);
    $this->assertRegExp("/\[email\]/", $view);
  }

  public function test_it_should_redirect_to_login_and_show_alert_if_it_has_email(){
    $data= array(
      "Umuser"=>array( "email"=>"test@test.com" )
    );

    $contents= $this->testAction('/reset_password',
      array("data"=>$data, "method"=>"post", "return"=>"contents") );

    $this->assertRegExp("/login/",  $this->headers["Location"] );
    $this->assertRegExp("/redirect to Login/", $contents);

  }

  public function test_it_should_and_show_an_error_if_doesnt_exit_email(){
    $data=array(
      "Umuser"=>array("email"=>"wrong@test.com")
    );

    $contents= $this->testAction("/reset_password", array("data"=>$data, "method"=>"post", "return"=>"contents"));

    $this->assertRegExp("/The Email Was Not Found/", $contents);
  }

  public function test_it_should_error_if_the_is_blank(){
    $data=array(
      "Umuser"=>array("email"=>"")
    );

    $contents= $this->testAction("/reset_password", array("data"=>$data, "method"=>"post", "return"=>"contents"));

    $this->assertRegExp("/Please Enter a Valid Email/", $contents);
  }


}


?>
