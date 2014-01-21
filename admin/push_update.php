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

// Get values from form 
$name=$_POST['name'];
$style=$_POST['style'];
$notes=$_POST['notes'];
$og=$_POST['og'];
$fg=$_POST['fg'];
$srm=$_POST['srm'];
$ibu=$_POST['ibu'];
$active=$_POST['active'];
$tapnumber=$_POST['tapnumber'];
$beerid=$_POST['beerid'];



// update data in mysql database
$sql="UPDATE beers SET name='$name', style='$style', notes='$notes', og='$og', fg='$fg', srm='$srm', 
ibu='$ibu', active='$active', tapnumber='$tapnumber' WHERE beerid='$beerid'";
$result=mysql_query($sql);

// if successfully updated.
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='beer_main.php'>Back To Beers</a>";
}

else {
echo "ERROR";
}

?> 
