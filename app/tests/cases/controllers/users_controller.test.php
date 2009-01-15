<?php 
/* SVN FILE: $Id$ */
/* UsersController Test cases generated on: 2008-05-23 12:05:14 : 1211534414*/
App::import('Controller', 'Users');

class TestUsers extends UsersController {
	var $autoRender = false;
}

class UsersControllerTest extends CakeTestCase {
	var $Users = null;

	function setUp() {
		$this->Users = new TestUsers();
	}

	function testUsersControllerInstance() {
		$this->assertTrue(is_a($this->Users, 'UsersController'));
	}

	function tearDown() {
		unset($this->Users);
	}
}
?>