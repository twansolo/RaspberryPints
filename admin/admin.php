<?
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Control Panel </title>
<?php 
    /*
    *
    *   Added:      1/20/2014 
    *   Author:     Ethan Jordan
    *   Comments:   Added this function to the classes for view.class.php
    *   This will dynamic display all of the stylesheets so that when a new one is added, it only
    *   needs to be modified in one location
    *
    */
    $views->load_admin_stylesheets();
?>
</head>
<body id="homepage">
<div id="header">
    	<br />&nbsp &nbsp <input type="button" value="My Account" class="btn" onClick="location. href='Mya.php'" />
<input type="button" value="Logout" class="btn" onClick="location. href='includes/endses.php'"/> <a href="personalize.php" title="personalize"><img src="img/icons/gear.png" height="30" width="30" align="right"></a>&nbsp;<a href="admin.php" title="home"><img src="img/icons/home.png" height="30" width="30" align="right"></a>
    </div>
        
    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
    	<ul>	
        	<li><img src="img/icons/icon_breadcrumb.png" alt="Location" /></li>
        	<li><strong>Location:</strong></li>
            <li><a href="#" title="">Sub Section</a></li>
            <li>/</li>
            <li class="current">Control Panel</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->
    
    <!-- Right Side/Main Content Start -->
    <div id="rightside">
	<p><h1>Welcome To The RaspberryPints Management Portal</h1></p>
	<p> Feel free to explore around and see what all we provide through your admin. Here in the admin you will be able <br/>to do a list of useful things, which include
	Adding and the removal of beer along with checking the stats on the<br/> activity of your tap.</p>
         
				<br/>
				<br/>
			    <br/>
				<br/>

        <div id="footer">
        	&copy; Copyright 2012-2014 RaspberryPints
        </div> 
          </div>
<!-- Right Side/Main Content End -->
    
       
	     <!-- Left Dark Bar Start -->
    <div id="leftside">
        <div id="welcome"> &nbsp &nbsp Hello: &nbsp 

            <?php 

            /*
            *
            *   Changed:    1/20/2014 
            *   Author:     Ethan Jordan
            *   Comments:   Added this function to the classes for admin.class.php
            *   Pulls the customers username from the database and displays it to the page.
            *
            */

            $admin->hello_user($_SESSION['myusername']);

            ?>
        </div>
    

    	<div class="user">
        	<a href="../"><img src="img/logo.png" width="120" height="120" class="hoverimg" alt="Avatar" /></a>

        </div>

        
        <ul id="nav">
        	<li>
                <ul class="navigation">
                    <li class="heading selected">Welcome</li>
                </ul>
            </li>
			 <li>
			 <ul class="navigation">
                    <li><a href="admin.php" title="Update">Home</a></li>
                </ul>
            <li>
                <a class="expanded heading">Configure</a>
                 <ul class="navigation">
                    <li><a href="beer_main.php" title="beer-list">Beer List</a></li>
					<li><a href="tap_list.php" title="tap-list">Tap List</a></li>
					<li><a href="personalize.php" title="personalize">Personalize</a></li>
                </ul>
            </li>
			            <li>
                <a class="expanded heading">Analytics</a>
                 <ul class="navigation">
                    <li><a href="#" target="" title="temperature">Temperature Monitoring</a>Coming soon</li>
                    <li><a href="#" title="GPT">Gallons Per Tap</a>Coming soon</li>
                    <li><a href="#" title="rank">Beer Rank</a>Coming soon</li>
                </ul>
            </li>
			            <li>
                <a class="expanded heading">Other Help</a>
                 <ul class="navigation">
					<li><a href="#" title="faq">F.A.Q</a></li>
					<li><a href="report_bug.php" title="faq">Report Bug</a></li>
					<li><a href="feedback.php" title="faq">FeedBack</a></li>					
                </ul>
            </li>            
        </ul>
    </div>
<?php
    /*
    *
    *   Added:      1/20/2014 
    *   Author:     Ethan Jordan
    *   Comments:   Added this function to the classes for view.class.php
    *   This will dynamic display all of the javascript applets so that when a new one is added, it only
    *   needs to be modified in one location
    *
    */
    $views->load_admin_javascript();
?>
</body>
</html>
