<?php

//Edit: Ethan Jordan : Will need to consolidate this into a function to allow just calling it on
//a logout screen rather than waste a page for it.

session_start();
session_destroy();
header("Location: ../index.php"); 

?> 