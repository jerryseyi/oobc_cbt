<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$maxRows_one = 20;
	$pageNum_one = 0;
	if (isset($_GET['pageNum_one'])) {
		$pageNum_one = $_GET['pageNum_one'];
	}

	$startRow_one = $pageNum_one * $maxRows_one;

	$query_one = "SELECT * FROM exam";

	$query_limit_one = sprintf("%s LIMIT %d, %d", $query_one, $startRow_one, $maxRows_one);

	$one = mysqli_query($local, $query_limit_one) or die(mysqli_error($local));
	$row_one = mysqli_fetch_assoc($one);
	

	if (isset($_GET['totalRows_one'])) {
		$totalRows_one = $_GET['totalRows_one'];
	} else {
		$all_one = mysqli_query($local, $query_one);
		$totalRows_one = mysqli_num_rows($all_one);
	}

	$totalPages_one = ceil($totalRows_one/$maxRows_one)-1;

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}
	if($isAdmin == false){
		header('Location:dasboard.php');
		exit();
	}

	$title = "Question";
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
										<div class="muted pull-left">Select subject</div>
										
									</div>
									<div id='calendar'>
									<style>
									
									
									</style>
									<table class="exam-table" border="1" width="100%" style="margin-top:20px;">
										<tr>
									
										<th>Exam</th>
										<th>Number of questions available</th>
										<th>Action</th>
										</tr>
										<?php do { 
										$count = $cbt->countQue($row_one['exam_id']);
										?>
										<tr>
											<td><?php echo $row_one['exam_name']; ?></td>
											<td><?php echo count($count); ?></td>
											<td><a href="que_m.php?exam_id=<?php echo $row_one['exam_id']; ?>">View questions</a></td>
										</tr>
										<?php } while ($row_one = mysqli_fetch_assoc($one)); ?>
									</table>
									</div>
									</div>
									
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
mysqli_free_result($one);
?>
