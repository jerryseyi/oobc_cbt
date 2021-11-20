<?php
  require_once('Connections/local.php');
  require_once('function.php');
  require('core/init.php');

	$editFormAction = $_SERVER['PHP_SELF'];

	if (isset($_SERVER['QUERY_STRING'])) {
		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
		$open=  strtotime($_POST['start_date']);
		$close=  strtotime($_POST['close_date']);

		$updateSQL = sprintf("UPDATE exam SET exam_name=%s, time_allowed=%s, number_of_question=%s, exam_desc=%s, start_date=%s, close_date=%s WHERE exam_id=%s",
			GetSQLValueString($_POST['exam_name'], "text"),
			GetSQLValueString($_POST['time_allowed'], "int"),
			GetSQLValueString($_POST['number_of_question'], "int"),
			GetSQLValueString($_POST['exam_desc'], "text"),
			GetSQLValueString($open, "text"),
			GetSQLValueString($close, "text"),
			GetSQLValueString($_POST['exam_id'], "int"));

		$Result1 = mysqli_query($local, $updateSQL) or die(mysqli_error($local));

		$updateGoTo = "manage.php?ms=2";

		if (isset($_SERVER['QUERY_STRING'])) {
			$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
			$updateGoTo .= $_SERVER['QUERY_STRING'];
		}

		header(sprintf("Location: %s", $updateGoTo));
	}

	$colname_three = "-1";

	if (isset($_GET['exam_id'])) {
		$colname_three = $_GET['exam_id'];
	}

	$query_three = sprintf("SELECT * FROM exam WHERE exam_id = %s", GetSQLValueString($colname_three, "int"));
	$three = mysqli_query($local, $query_three) or die(mysqli_error($local));
	$row_three = mysqli_fetch_assoc($three);
	$totalRows_three = mysqli_num_rows($three);

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}
	
	$title = "Edit Exam";
	require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeaderExt">
            <h2>Edit <?= htmlentities($row_three['exam_name'])?></h2>
        </div>

        <div class="add-form">
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                <div class="input-group">
                    <div class="input-box">
                        <label for="">Exam Name</label>
                        <div class="input-text-position"><input type="text" placeholder="Enter exam name" name="exam_name" value="<?= htmlentities($row_three['exam_name'], ENT_COMPAT, 'UTF-8');?>" size="32"><span></span></div>
                    </div>
                    <div class="input-box">
                        <div class="input-box-split">
                            <label for="">Time Allowed</label>
                            <div class="input-text-position"><input type="text" placeholder="Time in minutes ex. 30" name="time_allowed" value="<?= htmlentities($row_three['time_allowed'], ENT_COMPAT, 'UTF-8');?>" size="32"><span></span></div>
                        </div>
                        <div class="input-box-split">
                            <label for="">Number of Question</label>
                            <div class="input-text-position"><input type="text" placeholder="" name="number_of_question" value="<?= htmlentities($row_three['number_of_question'], ENT_COMPAT, 'UTF-8');?>" size="32"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="">Exam Description</label>
                        <div class="input-text-position"><input type="text" placeholder="" name="exam_desc" value="<?= htmlentities($row_three['exam_desc'], ENT_COMPAT, 'UTF-8');?>" size="32"><span></span></div>
                    </div>
                    <div class="input-box">
                        <div class="input-box-split">
                            <label for="">Start Date</label>
                            <div class="input-text-position">
                                <?php $dStart = date("Y-m-d", htmlentities($row_three['start_date'], ENT_COMPAT, 'UTF-8'));?>
                                <input type="date" placeholder="When the exam should start." id="start"
                                       name="start_date" size="32"><span></span></div>
                        </div>
                        <div class="input-box-split">
                            <label for="">Close Date</label>
                            <div class="input-text-position">
                                <?php $dEnd = date("Y-m-d", htmlentities($row_three['close_date'], ENT_COMPAT, 'UTF-8'));?>
                                <input type="date" placeholder="When the exam should end." id="dateClose"
                                name="close_date" size="32"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="submit" name="" value="Update Record" id="">
                </div>
                <input type="hidden" name="MM_update" value="form1">
                <input type="hidden" name="exam_id" value="<?php echo $row_three['exam_id']; ?>">
            </form>

            <?php include "footer.php"; ?>

<?php
mysqli_free_result($three);
?>
