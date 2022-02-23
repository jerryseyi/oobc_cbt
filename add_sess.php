<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$editFormAction = $_SERVER['PHP_SELF'];

	if (isset($_SERVER['QUERY_STRING'])) {
		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	    var_dump('hi');
		
		$insertSQL = sprintf('INSERT INTO `session` (session_name) VALUES ("%s")', htmlentities($_POST['session_name']));
		
		$Result1 = mysqli_query($local, $insertSQL) or die(mysqli_error($local));

		$insertGoTo = "session_m.php";

		if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		}

		header(sprintf("Location: %s", $insertGoTo));
	}

	$general->logged_out_protect();

	$me = $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	if($isAdmin == false){
		header('Location: dasboard.php');
		exit();
	}

	$title = "Add Session";
	require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Available Sessions</h2>
            <a href="add_que.php" class="btn">Add New Question</a>
        </div>

        <div class="add-form">
            <form action="" method="post">
                <div class="input-group mb-10">
                    <div class="input-box w-80 sm-mb-90 mb-0">
                        <label for="" style="margin-bottom: 10px">Academic Session</label>
                        <div class="input-text-position"><input type="text" placeholder="eg. 2013/2014" name="session_name" size="32"><span></span></div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="submit" name="" value="Insert Record" id="">
                </div>
											
                <input type="hidden" name="MM_insert" value="form1">
            </form>
<?php
    include "footer.php";
?>
