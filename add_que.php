<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$editFormAction = $_SERVER['PHP_SELF'];

	if (isset($_SERVER['QUERY_STRING'])) {
	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$insertSQL = sprintf("INSERT INTO question (exam_id, question, opt_A, opt_B, opt_C, opt_D, ans) VALUES (%s, %s, %s, %s, %s, %s, %s)",
						GetSQLValueString($_POST['exam_id'], "int"),
						GetSQLValueString($_POST['question'], "text"),
						GetSQLValueString($_POST['opt_A'], "text"),
						GetSQLValueString($_POST['opt_B'], "text"),
						GetSQLValueString($_POST['opt_C'], "text"),
						GetSQLValueString($_POST['opt_D'], "text"),
						GetSQLValueString($_POST['ans'], "text"));

	$Result1 = mysqli_query($local, $insertSQL) or die(mysql_error());

	header(sprintf("Location: %s", $editFormAction));
	}

	$query_Recordset1 = "SELECT * FROM exam";
	$Recordset1 = mysqli_query($local, $query_Recordset1) or die(mysql_error($local));
	$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	if($isAdmin == false){
		header('Location:dasboard.php');
		exit();
	}

	$title = "Add Question";
	$trix = "active";
	require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Add Questions</h2>
            <a href="add_que.php" class="btn">Add New Question</a>
        </div>

        <div class="add-form">
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                <div class="input-group">
                    <div class="input-box w-90 sm-mb-90 mb-0">
                        <label for="">Exam Name</label>
                        <div class="input-text-position">
                            <select name="exam_id" id="">
                                <?php
                                do {
                                    if(isset($_GET['exam_id']))
                                        $select = ( $_GET['exam_id'] == $row_Recordset1['exam_id']) ? "selected" : "";
                                    else
                                        $select = "";
                                    ?>
                                    <option value="<?php echo $row_Recordset1['exam_id']?>" <?php echo $select ?> ><?php echo $row_Recordset1['exam_name']?></option> <?php
                                } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box w-90 sm-mb-90 mb-0">
                        <label for="">Question</label>
                        <div class="input-text-position">
                            <input id="x" type="hidden" name="question">
                            <trix-editor input="x"></trix-editor>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box flex w-90">
                        <div class="input-box-split w-50 mr-5">
                            <label for="">Opt_A</label>
                            <div class="input-text-position"><input type="text" placeholder="" name="opt_A" size="32"><span></span></div>
                        </div>
                        <div class="input-box-split w-50 mr-5">
                            <label for="">Opt_B</label>
                            <div class="input-text-position"><input type="text" placeholder="" name="opt_B" size="32"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box flex w-90">
                        <div class="input-box-split w-50 mr-5">
                            <label for="">Opt_C</label>
                            <div class="input-text-position"><input type="text" placeholder="" name="opt_C" size="32"><span></span></div>
                        </div>
                        <div class="input-box-split w-50 mr-5">
                            <label for="">Opt_D</label>
                            <div class="input-text-position"><input type="text" placeholder="" name="opt_D" size="32"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box w-90 sm-mb-90 mb-0">
                        <label for="">Answer</label>
                        <div class="input-text-position">
                            <input type="text" name="ans" size="32">
                        </div>
                    </div>
                </div>
                <div class="input-group flex">
                    <input type="submit" name="" class="px-20" value="Insert Record" id="">
                    <input type="submit" name="" value="Go Back" id="" class="px-20 btn-gray" onclick="history.back()">
                </div>
                <input type="hidden" name="MM_insert" value="form1">
              </form>

		<?php include "footer.php"?>
<?php
mysqli_free_result($Recordset1);
?>
