<?php
require '../assets/admin.class.php';
$admin = new Admin;
session_start();
$session=session_id();
$time=time();
$time_check=$time-1800; //SET TIME 10 Minute

// username and password sent from form
$myusername=mysql_real_escape_string(stripslashes($_POST['myusername']));
$mypassword=md5(mysql_real_escape_string(stripslashes($_POST['mypassword'])));

if(isset($_POST['myusername']) && isset($_POST['mypassword']))
    if($admin->check_login($myusername, $mypassword)){
        $_SESSION['myusername'] = $myusername;
        $_SESSION['mypassword'] = $mypassword;
        echo "<script>location.href='admin.php';</script>";
    }elseif(strlen($_POST['myusername']) >= 32){
        //Check for character length username
        $errors = array('Error: The username you selected is too long.');
        
    }elseif(empty($_POST['mypassword'])){
        if(!isset($errors)){
            $errors = array();
            array_push($errors, 'Error: You have not entered a password.');
        }
    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>RaspberryPints-Login</title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />
<link href="styles/login.css" rel="stylesheet" type="text/css" />
<!-- Theme Start -->
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->

</head>
<body>
	<div id="logincontainer">
    	<div id="loginbox">
        	<div id="loginheader">
            	<a href="../" style="text-decoration:none;"><h1><font color="#2DABD5">RaspberryPints Login</h1></font></a>
            </div>
            <div id="innerlogin">
            	<form name="login" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                	<p>Enter your username:</p>
                	<input type="text" class="logininput" name="myusername" placeholder="Login Name" />
                    <p>Enter your password:</p>
                	<input type="password" class="logininput"  name="mypassword" placeholder="Password"/>
                    <?php
                        if(isset($errors)){
                            print_r($errors);
                        }
                    ?>
                   	<input type="submit" class="loginbtn" value="Log In" /><br />
<img src="img/lock.png" height="50" width="50">
                    <p><a href="reset_account.php" title="Forgotten Password?">Forgotten Password?</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>