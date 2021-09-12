<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$maxRows_two = 10;
	$pageNum_two = 0;

	if (isset($_GET['pageNum_two'])) {
		$pageNum_two = $_GET['pageNum_two'];
	}

	$startRow_two = $pageNum_two * $maxRows_two;

	$query_two = "SELECT * FROM exam ORDER BY exam_id DESC";
	$query_limit_two = sprintf("%s LIMIT %d, %d", $query_two, $startRow_two, $maxRows_two);
	$two = mysqli_query($local, $query_limit_two) or die(mysqli_error($local));
	$row_two = mysqli_fetch_assoc($two);

	if (isset($_GET['totalRows_two'])) {
		$totalRows_two = $_GET['totalRows_two'];
	} else {
		$all_two = mysqli_query($local, $query_two);
		$totalRows_two = mysqli_num_rows($all_two);
	}

	$totalPages_two = ceil($totalRows_two/$maxRows_two)-1;

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}
	
	$title = "Manage Exam";
	require_once("header.php");
?>
	<!--block -->
	<div class="container-fluid">
		<div class="row-fluid">
					<?php require_once("sidebar.php") ?>
						<!-- content -->
					<div class="span9" id="content">
						<div class="row-fluid">
							<!-- block -->
							<div id="block_bg" class="block">
									<div class="block-content collapse in">
										<div class="span12">
										<!-- block -->
											<div class="navbar navbar-inner block-header">
												<div class="muted pull-left">Available Exams</div>
												<div class="pull-right"><i class="icon-plus"></i> <a href="add_exam.php">Add new exam</a></div>
											</div>
											
											<table class="exam-table" border="0" style="border:1px solid #ccc; margin-top:20px;" width="100%">
												<style>
													
												</style>
											  <tr  style="border:1px double #ccc;">
												<th>S/N</th>
												<th>Exam name</th>
												<th>Time allowed</th>
												<th>Number of question</th>
												<th>Exam description</th>
												<th>Start date</th>
												<th>Close date</th>
												<th>Date added</th>
												<th colspan="2">Action</th>
											  </tr>
											  <?php 
											  $nos = 1;
											  do { ?>
												<tr  style="border:1px double #ccc;">
													<td><?= $nos ?></td>
													<td><?= $row_two['exam_name']; ?></td>
													<td><?= $row_two['time_allowed']; ?></td>
													<td><?= $row_two['number_of_question']; ?></td>
													<td><?= $row_two['exam_desc']; ?></td>
													<td><?= date("d/m/Y", $row_two['start_date']); ?></td>
													<td><?= date("d/m/Y", $row_two['close_date']); ?></td>
													<td><?= date("d/m/Y", $row_two['date_added']); ?></td>
													<td><a href="edit_exam.php?exam_id=<?= $row_two['exam_id']; ?>">Edit</a></td>
													<td><a href="del_exam.php?exam_id=<?= $row_two['exam_id']; ?>">Delete</a></td>
												</tr>
												<?php $nos++; } while ($row_two = mysqli_fetch_assoc($two)); ?>
											</table>
	
										</div>
										<!--block-->
									</div>
							</div>
						</div>
					</div>
						<!-- block -->
			</div>
		</div>
			<!-- /block -->
	<div style="text-align: center">
		<footer>
			<p>&copy; 2021. Powered by OOBC<sup>&reg;</sup></p>
		</footer>
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
	mysqli_free_result($two);
?>
