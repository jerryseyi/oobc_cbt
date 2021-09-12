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
	<div class="container-fluid">
		<div class="row-fluid">
			<?php require_once("sidebar.php"); ?> 
			<div class="span9" id="content">
					<div class="row-fluid">
					<!-- block -->
					<div id="block_bg" class="block">
			
							<div class="block-content collapse in">
									<div class="span12">
						<!-- block -->
									<div class="navbar navbar-inner block-header">
										<div class="muted pull-left">Add an exam</div>
									</div>
									<div id='calendar'>
										<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
										<table align="center">
											<tr valign="baseline">
											<td nowrap align="right">Exam name:</td>
											<td><input type="text" name="exam_name" value="<?php echo htmlentities($row_three['exam_name'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Time allowed:</td>
											<td><input type="text" name="time_allowed" value="<?php echo htmlentities($row_three['time_allowed'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Number of question:</td>
											<td><input type="text" name="number_of_question" value="<?php echo htmlentities($row_three['number_of_question'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right" valign="top">Exam description:</td>
											<td><textarea name="exam_desc" cols="50" rows="5"><?php echo htmlentities($row_three['exam_desc'], ENT_COMPAT, 'UTF-8'); ?></textarea></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Start date:</td>
											<td><input type="text" name="start_date" value="<?php echo date("m/d/Y", htmlentities($row_three['start_date'], ENT_COMPAT, 'UTF-8')); ?>" class="datepicker" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Close date:</td>
											<td><input type="text" name="close_date" value="<?php echo date("m/d/Y", htmlentities($row_three['close_date'], ENT_COMPAT, 'UTF-8')); ?>" class="datepicker" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">&nbsp;</td>
											<td><input type="submit" value="Update record"></td>
											</tr>
										</table>
										<input type="hidden" name="MM_update" value="form1">
										<input type="hidden" name="exam_id" value="<?php echo $row_three['exam_id']; ?>">
										</form>
										<p>&nbsp;</p>
									</div>		
						<!-- block -->
								</div>
									
						
						
					
									</div>
							</div>
						</div>
					</div>
					<!-- /block -->
				</div>
			</div>
		</div>

		<div style="text-align: center">
			<footer>
				<p>&copy; 2021. Powered by OOBC<sup>&reg;</sup></p>
			</footer>
		</div>

	</div>
	<script src="admin/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
	<script src="admin/assets/scripts.js"></script>
	<!-- data table -->
	<script src="admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
	<script src="admin/assets/DT_bootstrap.js"></script>		
	<!-- jgrowl -->
	<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>   
	<script>
		$(function() {
			// Easy pie charts
			$('.chart').easyPieChart({animate: 1000});
		});
		
		$(function() {
			$('.tooltip').tooltip();	
			$('.tooltip-left').tooltip({ placement: 'left' });	
			$('.tooltip-right').tooltip({ placement: 'right' });	
			$('.tooltip-top').tooltip({ placement: 'top' });	
			$('.tooltip-bottom').tooltip({ placement: 'bottom' });
			$('.popover-left').popover({placement: 'left', trigger: 'hover'});
			$('.popover-right').popover({placement: 'right', trigger: 'hover'});
			$('.popover-top').popover({placement: 'top', trigger: 'hover'});
			$('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
			$('.notification').click(function() {
				var $id = $(this).attr('id');
				switch($id) {
					case 'notification-sticky':
						$.jGrowl("Stick this!", { sticky: true });
					break;
					case 'notification-header':
						$.jGrowl("A message with a header", { header: 'Important' });
					break;
					default:
						$.jGrowl("Hello world!");
					break;
				}
			});
		});
	</script>
		
	<!--  -->
	<script src="admin/vendors/jquery.uniform.min.js"></script>
	<script src="admin/vendors/chosen.jquery.min.js"></script>
	<script src="admin/vendors/bootstrap-datepicker.js"></script>
	<!--  -->
	<script src="admin/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
	<script src="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
	<script src="admin/vendors/ckeditor/ckeditor.js"></script>
	<script src="admin/vendors/ckeditor/adapters/jquery.js"></script>
	<script type="text/javascript" src="admin/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
	<script>
		$(function() {
			// Ckeditor standard
			$( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
			$( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
		});
	</script>
	<!-- <script type="text/javascript" src="admin/assets/modernizr.custom.86080.js"></script> -->
	<script src="admin/assets/jquery.hoverdir.js"></script>
	<script src="admin/vendors/fullcalendar/fullcalendar.js"></script>
	<script src="admin/vendors/fullcalendar/gcal.js"></script>
	<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
	<script src="admin/vendors/bootstrap-datepicker.js"></script>
	<script>
		$(function() {
			$('#da-thumbs > li').hoverdir();

			$(".datepicker").datepicker();
			$(".uniform_on").uniform();
			$(".chzn-select").chosen();
			$('#rootwizard .finish').click(function() {
				alert('Finished!, Starting over!');
				$('#rootwizard').find("a[href*='tab1']").trigger('click');
			});
		});
	</script>
    </body>
</html>
<?php
mysqli_free_result($three);
?>
