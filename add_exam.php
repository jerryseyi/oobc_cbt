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
	<div class="container-fluid">
		<div class="row-fluid">
			<?php require_once("sidebar.php") ?>
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
											<td><input type="text" name="exam_name" value="" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Time allowed:</td>
											<td><input type="text" name="time_allowed" placeholder="Time in mins e.g 30" value="" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Number of question:</td>
											<td><input type="text" name="number_of_question" value="" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Exam description:</td>
											<td><input type="text" name="exam_desc" value="" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Start date:</td>
											<td><input type="text" class="input-block-level datepicker" name="start_date" value="" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">Close date:</td>
											<td><input type="text" class="input-block-level datepicker" name="close_date" value="" size="32"></td>
											</tr>
											<tr valign="baseline">
											<td nowrap align="right">&nbsp;</td>
											<td><input type="submit" value="Submit"></td>
											</tr>
										</table>
										<input type="hidden" name="MM_insert" value="form1">
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