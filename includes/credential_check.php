<?php
error_reporting(0);
//Start session
session_start();

//to hide password checking for testing
$flag = 0;

//Array to store validation errors
$errmsg_arr = array();
	
//Validation error flag
$errflag = false;
	
//Function to sanitize values received from the form. Prevents SQL injection
function clean($str)
{
	$str = @trim($str);
	if(get_magic_quotes_gpc())
	$str = stripslashes($str);
	
	return mysql_real_escape_string($str);
}
	
//Sanitize the POST values
$login = clean($_POST['user_name']);
$password = clean($_POST['user_password']);
	
//Input Validations
if($login == '')
{
	$errmsg_arr[] = 'Login ID missing';
	$errflag = true;
}

if($password == '')
{
	$errmsg_arr[] = 'Password missing';
	$errflag = true;
}
	
//If there are input validations, redirect back to the login form
if($errflag)
{
	$_SESSION['fud_fill']['errmsg_arr'] = $errmsg_arr;
	session_write_close();
	header("location: ../login.php");
	exit();
}

if($password == 'admin@123')
{
	$_SESSION['fud_fill']['user_name'] = $login;
	$_SESSION['fud_fill']['user_type'] = 'Admin';
	
	header("location: ../Routeplan/fudfill_plan_route.php");
}
else
{
	session_write_close();
	header("location: ../login.php");
}
?>