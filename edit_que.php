<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	$updateSQL = sprintf("UPDATE question SET exam_id=%s, question=%s, opt_A=%s, opt_B=%s, opt_C=%s, opt_D=%s, ans=%s WHERE que_id=%s",
		GetSQLValueString($_POST['exam_id'], "int"),
		GetSQLValueString($_POST['question'], "text"),
		GetSQLValueString($_POST['opt_A'], "text"),
		GetSQLValueString($_POST['opt_B'], "text"),
		GetSQLValueString($_POST['opt_C'], "text"),
		GetSQLValueString($_POST['opt_D'], "text"),
		GetSQLValueString($_POST['ans'], "text"),
		GetSQLValueString($_POST['que_id'], "int"));

	$Result1 = mysqli_query($local, $updateSQL) or die(mysqli_error($local));

	$updateGoTo = "que_m.php?exam_id=".GetSQLValueString($_GET['exam_id'], "int");
	header(sprintf("Location: %s", $updateGoTo));
	}

	$colname_fifth = "-1";
	if (isset($_GET['que_id'])) {
	$colname_fifth = $_GET['que_id'];
	}

	$query_fifth = sprintf("SELECT * FROM question WHERE que_id = %s", GetSQLValueString($colname_fifth, "int"));
	$fifth = mysqli_query($local, $query_fifth) or die(mysqli_error($local));
	$row_fifth = mysqli_fetch_assoc($fifth);
	$totalRows_fifth = mysqli_num_rows($fifth);

	$query_seven = "SELECT * FROM exam";
	$seven = mysqli_query($local, $query_seven) or die(mysqli_error($local));
	$row_seven = mysqli_fetch_assoc($seven);
	$totalRows_seven = mysqli_num_rows($seven);

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	$tinymce = 'active';
	$title = "Edit Question";
	require_once("header.php");
//
//    function loadTinyMCE($html) {
//        echo "
//            <script type='text/javascript'>function loadDefaultTinyMCEContent(){
//                 tinymce.activeEditor.setContent('$html');
//            }</script>
//        ";
//    }
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Add Questions</h2>
            <a href="add-question.html" class="btn">Add New Question</a>
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
                                    ?>
                                    <option value="<?php echo $row_seven['exam_id']?>"<?php if (!(strcmp($row_seven['exam_id'], htmlentities($_GET['exam_id'])))) {echo " SELECTED";} ?>><?php echo $row_seven['exam_name']?></option>
                                    <?php
                                } while ($row_seven = mysqli_fetch_assoc($seven));
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box w-90 sm-mb-90 mb-0">
                        <label for="">Question</label>
                        <div class="input-text-position">
                            <textarea name="question" id="tiny"><?= htmlentities($row_fifth['question'], ENT_COMPAT, 'UTF-8')?></textarea>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box flex w-90">
                        <div class="input-box-split w-50 mr-5">
                            <label for="">Opt_A</label>
                            <div class="input-text-position">
<!--                                <textarea name="Opt_A" id="tiny">--><?php //echo htmlentities($row_fifth['opt_A'], ENT_COMPAT, 'UTF-8'); ?><!--</textarea>-->
                                <input type="text" id="inp1" name="opt_A" value="<?php echo htmlentities($row_fifth['opt_A'], ENT_COMPAT, 'UTF-8'); ?>" size="32"><span></span></div>
                        </div>
                        <div class="input-box-split w-50 mr-5">
                            <label for="">Opt_B</label>
                            <div class="input-text-position"><input type="text" id="inp2" name="opt_B" value="<?php echo htmlentities($row_fifth['opt_B'], ENT_COMPAT, 'UTF-8'); ?>" size="32"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box flex w-90">
                        <div class="input-box-split w-50 mr-5">
                            <label for="">Opt_C</label>
                            <div class="input-text-position"><input type="text" id="inp3" name="opt_C" value="<?php echo htmlentities($row_fifth['opt_C'], ENT_COMPAT, 'UTF-8'); ?>" size="32"><span></span></div>
                        </div>
                        <div class="input-box-split w-50 mr-5">
                            <label for="">Opt_D</label>
                            <div class="input-text-position"><input type="text" id="inp4" name="opt_D" value="<?php echo htmlentities($row_fifth['opt_D'], ENT_COMPAT, 'UTF-8'); ?>" size="32"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box w-90 sm-mb-90 mb-0">
                        <label for="">Answer</label>
                        <div class="input-text-position">
                            <input type="text" name="ans" value="<?php echo htmlentities($row_fifth['ans'], ENT_COMPAT, 'UTF-8'); ?>" size="32">
                        </div>
                    </div>
                </div>
                <div class="input-group flex">
                    <input type="submit" name="" class="px-20" value="Update Record" id="">
                </div>
                <input type="hidden" name="MM_update" value="form1">
                <input type="hidden" name="que_id" value="<?php echo $row_fifth['que_id']; ?>">
            </form>
										
            <?php include "footer.php";?>
<?php
mysqli_free_result($fifth);
mysqli_free_result($seven);
?>
