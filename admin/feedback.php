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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>RaspberryPints-Feedback</title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />
<link href="styles/wysiwyg.css" rel="stylesheet" type="text/css" />
<!-- Theme Start -->
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->
<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
<style>

#welcome
{ font-family: 'Fredoka One', cursive; font-weight: 400; color: white; font-size:140% }

</style>


</head>
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
            <li class="current">Feedback</li>
        </ul>
    </div>
    <!-- Top Breadcrumb End --> 
     
    <!-- Right Side/Main Content Start -->
    <div id="rightside">
<div class="contentcontainer med left">
            <div class="headings alt">
                <h2>Let Us Know</h2>
            </div>
            <div class="contentbox">
            	<form action="formmailer.php" method="post">
                <input type="hidden" name="subject" value="Submission" />
				<p><b>Do you have an idea or a suggestion? Then let us know, we love making Raspberry Pints better. </b></p>
            		<p>
                        <label for="textfield"><strong>Name:</strong></label>
                        <input type="text" id="textfield" name="name" class="inputbox" /> <br />
                    </p>
                    <p> 
                        <label for="textfield"><strong>Email:</strong></label>
                        <input type="text" id="textfield" name="email" class="inputbox" /> <br />
                    </p>            
 <p>
                        <label for="textfield"><strong>Details:</strong></label></p>				
				<textarea class="text-input textarea" id="wysiwyg" name="details" rows="10" cols="75"></textarea>

		      <br />
                <input type="submit" value="Submit" class="btn" />
				</form>  
            </div>
        </div>
        <div id="footer">
        	&copy; Copyright 2012-2014 RaspberryPints
        </div> 
          
    </div>
    <!-- Right Side/Main Content End -->
    
        <!-- Left Dark Bar Start -->
    <div id="leftside">
<div id="welcome"> &nbsp &nbsp Hello: &nbsp
  <?php
  
  $sql="SELECT `name` FROM `users` WHERE username='$_SESSION[myusername]'";
  $result=mysql_query($sql);

echo mysql_result($result, 0, 'name');
?></div>
    	<div class="user">
        	<a href="../"><img src="img/logo.png" width="120" height="120" class="hoverimg" alt="Avatar" /></a>
			</div>

        
        <ul id="nav">
        	<li>
                <ul class="navigation">
                    <li class="heading selected">Welcome</li>
                </ul>			 <li>
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
                    <li><a href="#" target="" title="temperature">Temperature Monitoring</a>Comming soon</li>
                    <li><a href="#" title="GPT">Gallons Per Tap</a>Comming soon</li>
                    <li><a href="#" title="rank">Beer Rank</a>Comming soon</li>
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
    <!-- Left Dark Bar End --> 
    
    <script type="text/javascript" src="js/enhance.js"></script>	
    <script type='text/javascript' src='js/excanvas.js'></script>
	<script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery-ui.min.js'></script>
	<script type='text/javascript' src='scripts/jquery.wysiwyg.js'></script>
    <script type='text/javascript' src='scripts/visualize.jQuery.js'></script>
    <script type="text/javascript" src='scripts/functions.js'></script>
    
    <!--[if IE 6]>
    <script type='text/javascript' src='scripts/png_fix.js'></script>
    <script type='text/javascript'>
      DD_belatedPNG.fix('img, .notifycount, .selected');
    </script>
    <![endif]--> 
</body>
</html>
