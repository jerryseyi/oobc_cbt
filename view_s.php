<?php

	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$currentPage = $_SERVER["PHP_SELF"];

	$maxRows_ree = 10;
	$pageNum_ree = 0;

	if (isset($_GET['pageNum_ree'])) {
		$pageNum_ree = $_GET['pageNum_ree'];
	}

	$startRow_ree = $pageNum_ree * $maxRows_ree;

	$colname_ree = "-1";
	if (isset($_GET['session_id'])) {
		$colname_ree = $_GET['session_id'];
	}

	$query_ree = sprintf("SELECT * FROM users WHERE session_id = %s", GetSQLValueString($colname_ree, "int"));
	$query_limit_ree = sprintf("%s LIMIT %d, %d", $query_ree, $startRow_ree, $maxRows_ree);

	$student_query = mysqli_query($local, $query_limit_ree) or die(mysql_error($local));

	$total_student_rows = mysqli_num_rows($student_query);

	if (isset($_GET['totalRows_ree'])) {
		$totalRows_ree = $_GET['totalRows_ree'];
	} else {
		$all_ree = mysqli_query($local, $query_ree);
		$totalRows_ree = mysqli_num_rows($all_ree);
	}
	$totalPages_ree = ceil($totalRows_ree/$maxRows_ree)-1;

	$queryString_ree = "";

	if (!empty($_SERVER['QUERY_STRING'])) {
		$params = explode("&", $_SERVER['QUERY_STRING']);

		$newParams = array();

		foreach ($params as $param) {
			if (stristr($param, "pageNum_ree") == false && 
				stristr($param, "totalRows_ree") == false) {
				array_push($newParams, $param);
			}
		}

		if (count($newParams) != 0) {
			$queryString_ree = "&" . htmlentities(implode("&", $newParams));
		}
	}

	$queryString_ree = sprintf("&totalRows_ree=%d%s", $totalRows_ree, $queryString_ree);

	$general->logged_out_protect();

	$me = $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	if($isAdmin == false){
		header('Location:dasboard.php');
		exit();
	}

	$title = "View Students";
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
								<div class="muted pull-left">Available Sessions</div>
								<div class="pull-right"><i class="icon-plus"></i> <a href="add_sess.php">Add new session</a></div>
							</div>
							<div id='calendar'>
								<table class="exam-table" border="0" width="100%">
									<tr>
										<th>Photo</th>
										<th>Username</th>
										<th>Fullname</th>
										<th colspan=4>Actions</th>
									</tr>

									<?php if($total_student_rows == 0): ?>
										<td colspan="4">No record found.</td>
									<?php else: ?>

										<?php while($row_ree = mysqli_fetch_assoc($student_query)): ?>
											<tr>
												<td width="80" height="100"><img src="<?= $row_ree['photo']; ?>" style="width:80px; height:100px;"></td>
												<td><?= $row_ree['username']; ?></td>
												<td><?= $row_ree['Fullname']; ?></td>
												
												<td><a href="edit_user.php?id=<?= $row_ree['id']; ?>">Edit</a></td>
												<td><a href="view.php?id=<?= $row_ree['id']; ?>">View result</a></td>

												<?php
													$usr = $users->userdata($row_ree['id']);

													if( $usr['role'] == 0 ){
														echo "<td><a href='makeadmin.php?action=make&session_id=".$row_ree['session_id']."&user_id=".$row_ree['id']."' title='Make Admin' >Make Admin</a></td>";
													}else{
														echo "<td><a href='makeadmin.php?action=remove&session_id=".$row_ree['session_id']."&user_id=".$row_ree['id']."' title='Remove Admin' >Remove Admin</a></td>";
													}
												?>
												
											</tr>

										<?php endwhile; ?>

									<?php endif; ?>

								</table>
								
								Records <?= ($startRow_ree + 1) ?> to <?= min($startRow_ree + $maxRows_ree, $totalRows_ree) ?> of <?php echo $totalRows_ree ?> 
								<table border="0">
									<tr>
									<td><?php if ($pageNum_ree > 0) { // Show if not first page ?>
										<a href="<?php printf("%s?pageNum_ree=%d%s", $currentPage, 0, $queryString_ree); ?>">First</a>
										<?php } // Show if not first page ?></td>
									<td><?php if ($pageNum_ree > 0) { // Show if not first page ?>
										<a href="<?php printf("%s?pageNum_ree=%d%s", $currentPage, max(0, $pageNum_ree - 1), $queryString_ree); ?>">Previous</a>
										<?php } // Show if not first page ?></td>
									<td><?php if ($pageNum_ree < $totalPages_ree) { // Show if not last page ?>
										<a href="<?php printf("%s?pageNum_ree=%d%s", $currentPage, min($totalPages_ree, $pageNum_ree + 1), $queryString_ree); ?>">Next</a>
										<?php } // Show if not last page ?></td>
									<td><?php if ($pageNum_ree < $totalPages_ree) { // Show if not last page ?>
										<a href="<?php printf("%s?pageNum_ree=%d%s", $currentPage, $totalPages_ree, $queryString_ree); ?>">Last</a>
										<?php } // Show if not last page ?></td>
									</tr>
								</table>
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
	if($total_student_rows != 0){
		mysqli_free_result($student_query);
	}
?>
