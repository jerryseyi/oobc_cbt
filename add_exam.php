<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$editFormAction = $_SERVER['PHP_SELF'];

	if (isset($_SERVER['QUERY_STRING'])) {
		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
		$date= time();

		$open=  strtotime($_POST['start_date']);
		$close=  strtotime($_POST['close_date']);
		$insertSQL = sprintf("INSERT INTO exam (exam_name, time_allowed, number_of_question, exam_desc, start_date, close_date, date_added) VALUES (%s, %s, %s, %s, %s, %s, $date)",
		GetSQLValueString($_POST['exam_name'], "text"),
		GetSQLValueString($_POST['time_allowed'], "int"),
		GetSQLValueString($_POST['number_of_question'], "int"),
		GetSQLValueString($_POST['exam_desc'], "text"),
		GetSQLValueString($open, "text"),
		GetSQLValueString($close, "text"));

		$Result1 = mysqli_query($local, $insertSQL) or die(mysql_error());

		$insertGoTo = "manage.php";

		if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		}

		header(sprintf("Location: %s", $insertGoTo));
	}

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	$title = "Add Exam";
	require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeaderExt">
            <h2>Available Exams</h2>
        </div>

        <div class="add-form">

            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                <div class="input-group">
                    <div class="input-box">
                        <label for="">Exam Name</label>
                        <div class="input-text-position"><input type="text" placeholder="Enter exam name" name="exam_name" size="32"><span></span></div>
                    </div>
                    <div class="input-box">
                        <div class="input-box-split">
                            <label for="">Time Allowed</label>
                            <div class="input-text-position"><input type="text" placeholder="Time in minutes ex. 30" name="time_allowed" size="32"><span></span></div>
                        </div>
                        <div class="input-box-split">
                            <label for="">Number of Question</label>
                            <div class="input-text-position"><input type="text" placeholder="" name="number_of_question" size="32"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="">Exam Description</label>
                        <div class="input-text-position"><input type="text" placeholder="" name="exam_desc" size="32"><span></span></div>
                    </div>
                    <div class="input-box">
                        <div class="input-box-split">
                            <label for="">Start Date</label>
                            <div class="input-text-position"><input type="date" placeholder="When the exam should start." name="start_date" size="32"><span></span></div>
                        </div>
                        <div class="input-box-split">
                            <label for="">Close Date</label>
                            <div class="input-text-position"><input type="date" placeholder="When the exam should end." name="close_date" size="32"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="submit" name="" value="Add" id="">
                </div>
                <input type="hidden" name="MM_insert" value="form1">
                </form>

		<?php include "footer.php"?>