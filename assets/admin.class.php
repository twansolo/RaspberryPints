<?php

//Admin Functions

class BaseMySQLClass {
	/*
	 *
	 *	Added:		1/20/2014
	 *	Author:		Ethan Jordan
	 *	Comments:	This base class is an examples class that dictates when the class or extended
	 *				class is loaded that it will load the "construct" which will auto-login to the
	 *				specified database.  By doing this, we are able to connect to multiple dbs and keep
	 *				it in OOP format.  Then we load other classes easilly which we can use for loops and grabbing results
	 *
	*/
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
	/*
	 *
	 *	Added:		1/20/2014
	 *	Author:		Ethan Jordan
	 *	Comments:	This is an extension of our base class which will connect to the database
	 *				Any time a query or command needs to be run multiple times or simplified for ease of use
	 *				is to be merged into this class.
	*/
	public function connect() {
		/*
		 *
		 *	Added:		1/20/2014
		 *	Author:		Ethan Jordan
		 *	Comments:	Self-Explanitory, connection
		 *
		*/
		if(!$this->Connection = mysql_connect("localhost","root","EMJ0rd@n")) {
			echo mysql_error();
			exit;
		}
	}

	public function select_db() {
		/*
		 *
		 *	Added:		1/20/2014
		 *	Author:		Ethan Jordan
		 *	Comments:	Self-Explanitory, connection
		 *
		*/
		mysql_select_db("raspberrypints",$this->Connection);
	}

	public function hello_user($user){
        /*
        *
        *   Changed:    1/20/2014 
        *   Author:     Ethan Jordan
        *   Comments:   Added this function to the classes for admin.class.php
        *   			Pulls the customers username from the database and displays it to the page.
        *				Merged this from prior Shawn Kemp code for ease of use.
        *
        */

        //The user variable passed in has been verified in the database and the session was created on login.
        //However, to double check that there was no data tamper, we run checks again.
        mysql_real_escape_string(stripslashes($user));
        $query 	=	mysql_query("SELECT `name` FROM `users` WHERE username='$user'");
  		$result =	mysql_fetch_object($query);
  		echo $result->name;
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