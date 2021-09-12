<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$page = 0;
	$per_page = 10;

	if (isset($_GET['pageNum_two'])) {
		$page = $_GET['pageNum_two'];
	}

	$session_time = "-1";

	if (isset($_SESSION['time'])) {
		$session_time = $_SESSION['time'];
	}

	$time = time();
	$exam_query_string = "SELECT * FROM exam WHERE start_date < '$time' AND close_date > '$time'";
	$exam_query = mysqli_query($local, $exam_query_string) or die(mysqli_error($local));
	
	$total_record_num = mysqli_num_rows($exam_query);
	
	$general->logged_out_protect();

	$me = $users->userdata($_SESSION['id']);

	$isAdmin= false;

	if($me['role'] == 1){
		$isAdmin= true;
	}
	
	$title = ".::Home::.";
	require_once("header.php");
?> 
	<style>
		tr, td{ border:1px solid #ededed; }
	</style>
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

								<?php if($isAdmin == false): ?>

									<div class="navbar navbar-inner block-header">
										<div class="muted pull-left">Available test</div>
									</div>

									<div id='calendar'>
										<table  width="100%" style="margin-top:20px;">
											<?php if($total_record_num == 0): ?>
											
												<tr>
													<td colspan="5">No record found</td>
												</tr>

											<?php else: ?>

												<?php while($exam_record = mysqli_fetch_assoc($exam_query)): ?>
												<?php
													$thir = $cbt->fetchDone($_SESSION['id'], $exam_record['exam_id']);
	
													if(count($thir) >= 1){
														$msg="Attempted";
													}else{
														$msg='<a href="#" onClick="if(confirm(\'Are you sure you want to attempt test?\')){ window.location= \'attempt.php?exam_id='.$exam_record['exam_id'].'\'; } else{ window.location= \'dashboard.php\';}"> Attempt test</a>';
													}
												?>
	
												<tr>
													<td><?= $exam_record['exam_name']; ?></td>
													<td><?= $exam_record['time_allowed'].' mins'; ?></td>
													<td><?= 'Only one attempt is allowed'; ?></td>
													<td><?= $exam_record['number_of_question'].' Questions'; ?></td>
													<td><?= $msg; ?></td>
												</tr>
	
												<?php endwhile; ?>
											<?php endif; ?>
											
										</table>
									</div>

								<?php else: ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> Make sure the <a href="settings.php" title="Settings" >Session and Semester Settings</a> are both correct to avoid any error!</div>
									<p style="text-align: center"><b>Please select a menu to manage at the sidebar</b></p>
								<?php endif; ?>
								
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
		<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
		<link href="admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
		<link href="admin/vendors/chosen.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="admin/assets//style.css" />
		<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">

		<script src="admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="admin/assets/scripts.js"></script>
			<!-- data table -->
		<script src="admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="admin/assets/DT_bootstrap.js"></script>		
			<!-- jgrowl -->
		<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>
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
		<!-- <script type="text/javascript" src="admin/assets/modernizr.custom.86080.js"></script> -->
		<script src="admin/assets/jquery.hoverdir.js"></script>
		<script src="admin/vendors/fullcalendar/fullcalendar.js"></script>
		<script src="admin/vendors/fullcalendar/gcal.js"></script>
		<script src="admin/vendors/bootstrap-datepicker.js"></script>
		<script>
			var url;
			function confirmation(url){
				var answer= confirm('Are you sure you\'re ready for this Exam?\n\n Click "OK" to Proceed to Exam or Click "CANCEL" otherwise');
				if(answer){
					window.location= url;
				}else{
					return false;
				}
			}

			$(function() {
				$('#da-thumbs > li').hoverdir();

				$(".datepicker").datepicker();
				$(".uniform_on").uniform();
				$(".chzn-select").chosen();
				$('#rootwizard .finish').click(function() {
					alert('Finished!, Starting over!');
					$('#rootwizard').find("a[href*='tab1']").trigger('click');
				});

				// Ckeditor standard
				$( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
					{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
					[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
					{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
				]});
				$( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});

				// Easy pie charts
				$('.chart').easyPieChart({animate: 1000});

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
    </body>
</html>

<?php mysqli_free_result($exam_query); ?>
