<?php

function db(){
	$link = mysql_connect("localhost", "root", "EMJ0rd@n");
	mysql_select_db("raspberrypints");
}

?>