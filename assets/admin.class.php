<?php

//Admin Functions

class BaseMySQLClass {
	public function __construct() {
		$this->connect();
		$this->select_db();
	}
	public function __destruct() {
		mysql_close();
	}
	public function connect() {
		echo "Yeah, you need one of the extended classes";
	}
	public function query($sql) {
		return mysql_query($sql,$this->Connection);
	}
	public function escape($Var) {
		return mysql_escape_string($Var);
	}
	public function fetch_object($Res) {
		return mysql_fetch_object($Res);
	}
	public function num_rows($Res) {
		return mysql_num_rows($Res);
	}
	public function ping() {
		mysql_ping($this->Connection);
	}
	public function escape_string($Var) {
		return mysql_escape_string($Var);
	}
}
class Admin extends BaseMySQLClass{
	public function connect() {
		if(!$this->Connection = mysql_connect("localhost","root","EMJ0rd@n")) {
			echo mysql_error();
			exit;
		}
	}

	public function select_db() {
		mysql_select_db("raspberrypints",$this->Connection);
	}

	public function hello_user($user){
  		$result=mysql_query("SELECT `name` FROM `users` WHERE username='$user'");

  		echo mysql_result($result, 0, 'name');

	}
	public function check_login($username, $password){
		$result=mysql_query("SELECT `username` FROM `users` WHERE username='$username' and password='$password'");
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1){
			return true;
		}else{
			return false;
		}
	}
	public function is_logged_in(){
		session_start();
		if(!isset( $_SESSION['myusername'] )){
			header("location:index.php");
		}
	}
	 


}

?>