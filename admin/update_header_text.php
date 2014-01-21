<?php
    /*
    *
    *   Changed:    1/20/2014 
    *   
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


// Get values from form 
$header_text=$_POST['header_text'];




// update data in mysql database
$sql="UPDATE config SET configValue='$header_text' WHERE configName ='headerText'";
$result=mysql_query($sql);

// if successfully updated.
if($result){
echo "Successful";
echo "<BR>";
echo "<script>location.href='personalize.php';</script>";
}

else {
echo "ERROR";
}

?> 
