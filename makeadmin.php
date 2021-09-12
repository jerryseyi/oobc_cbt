<?php require_once('Connections/local.php'); 
require('core/init.php');
	$general->logged_out_protect();
	$me= $users->userdata($_SESSION['id']);
	if($me['role'] == 1)
	{
		$isAdmin= true;
	}
	if($isAdmin == false)
	{
		header('Location:dasboard.php');
		exit();
	}

	
	if(!isset($_GET['action']) || !isset($_GET['user_id']) || !isset($_GET['session_id'])){
		header("Location: dashboard.php");
	}
	$action = $_GET['action'];
	$user_id = (int)$_GET['user_id'];
	$session_id = $_GET['session_id'];
	echo $action;
	
	if($action == "make"){
		$users->makeAdmin(1, $user_id);
	}elseif($action == "remove"){
		$users->makeAdmin(0, $user_id);
	}else{
		header("Location:dashboard.php");
		exit();
	}
	header("Location: view_s.php?session_id=$session_id");
	exit();
?>