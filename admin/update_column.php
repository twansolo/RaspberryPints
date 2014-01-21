<?php
    /*
    *
    *   Changed:    1/20/2014 
    *   Author:     Ethan Jordan
    *   Comments:   Added this function to the classes for admin.class.php
    *   This function now verifies to check the session for the user to verify logged in.
    *   If not, redirects back to the index.php.  Going to integrate it to the errors class 
    *   in the future to ensure the user knows why they were redirected.
    *
    */
    require '../assets/admin.class.php';
    require '../assets/views.class.php';
    $admin = new Admin;
    $views = new Views;
    $admin->is_logged_in();
    
require '../includes/config_names.php';
require 'includes/configp.php';



// Get values from form 
$name=$_POST['id'];
$config_Value=$_POST['configValue'];

foreach($_POST as $k => $v){
	// update data in mysql database
	$stmt = $conn->prepare("UPDATE config SET configValue=:configValue WHERE id=:id");
	$stmt->bindParam(':configValue', $v, PDO::PARAM_STR);
	$stmt->bindParam(':id', $k, PDO::PARAM_STR);
	$result = $stmt->execute();
}


echo "<script>location.href='personalize.php';</script>";





?> 
