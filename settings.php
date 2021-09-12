<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$general->logged_out_protect();

	$me = $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	$title = "Settings";
	require_once("header.php");
?> 
		<link rel="stylesheet" type="text/css" href="admin/assets//style.css" />
		<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
		<link href="admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
		<link href="admin/vendors/chosen.min.css" rel="stylesheet" media="screen">

		<style>
			#calendar p{
				display:block;
				margin-top:20px;
				text-align:center;
			}
			#calendar .controls{
				text-align:center;
			}
		</style>

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
										<div class="muted pull-left">Settings</div>
									</div>
									
									<div id='calendar'>
										<form method="POST" name="form1" action="">
											<p>
												Current Session: <select name='session'>
													
												<?php
													$current = $cbt->getCurrentSession();
													$sessions = $cbt->getAllSession();
													foreach($sessions as $session){
														$selected = ($session->session_id == $current->session_id) ? "selected" : "";
														echo "\n<option value='$session->session_id' $selected >$session->session_name</option>";
													}
												?>
												</select>
											</p>
											<p>
												Current Semester: <select name='semester'>
													
												<?php
													$currents = $cbt->getCurrentSemester();
													$semesters = $cbt->getAllSemester();
													foreach($semesters as $semester){
														$selected = ($semester->semester_id == $currents->semester_id) ? "selected" : "";
														echo "\n<option value='$semester->semester_id' $selected >$semester->semester</option>";
													}
												?>
												</select>
											</p>
											<?php
												if(isset($_POST['save'])){
													$current_session = (int) $_POST['session'];
													$current_semester = (int) $_POST['semester'];
													
													$cbt->setCurrentSession($current_session);
													$cbt->setCurrentSemester($current_semester);
													header("Location: dashboard.php");
												}
											?>

											<div class="control-group">
												<div class="controls">
												<input type="submit" class="btn-info" value="Save" name='save' />
												</div>
											</div>
										</form>
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