<?php
ob_start();
session_start();
require_once 'connect/database.php';
require_once 'classes/users.php';
require_once 'classes/general.php';
require_once 'classes/post.php';
require_once 'classes/courses.php';
require_once('classes/events.php');
require_once('classes/cbt.php');

//ini_set(error_reporting(E_COMPILE_ERROR | E_DEPRECATED | E_ALL), 1);
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);


$users 		= new Users($db);
$general 	= new General();
$post 	= new Posts($db);
$courses 	= new Courses($db);
$event 	= new Events($db);
$cbt= new Cbt($db);
$errors = array();
$que_no= array();
if(isset($_SESSION['id']))
{
	$m = $users->userdata($_SESSION['id']);
	
	if($m['role'] == 1)
	{
		$isAdmin= true;
	}
	else
	{
		$isAdmin= false;
	}
}

function view($name, $data = []) {
    extract($data);
    return require "{$name}.php";
}