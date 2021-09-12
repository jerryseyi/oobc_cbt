<?php
require('core/init.php');
$me= $users->userdata($_SESSION['id']);
if(!isset($_GET['fgb80bb77b80bb7787ea5df4d69f39']))
{
	header('location: dashboard.php');
	exit();
}
$score=0;
$num= (int)$_GET['fgb80bb77b80bb7787ea5df4d69f39'];
$ins= $cbt->insAtt($_SESSION['id'], $num);
$getnum= $cbt->examById($num);
$number= $getnum['number_of_question'];
if(isset($num))
	{
		for($i=0; $i<$number; $i++)

		{
			if($_POST['q'.$i] == $_SESSION[$i.'ans'])
			{
				$score = $score+1;
			}
		}
	}
	$avg=  $score/$number;
	$final= sprintf("%.2f", $avg*100);
	//
	$addScore= $cbt->addScore($_SESSION['id'], $_GET['fgb80bb77b80bb7787ea5df4d69f39'], $final, time());
?>

<?php
	$title = "Result";
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
							<div class="muted pull-left">Result</div>
						</div>
						<div id='calendar'>
							<center>
						   <?php echo '<h1>Congratulations, '.$me['Fullname'].'.</h1><br><h4>You got '.$score.' questions right'. '</h3><br><h4>You got '.($number - $score).' questions wrong</h4><br> 
						   <h4>In total, You scored, </h4>
						   <h1 class="chart">'.$final.'%</h1>'; ?>
						   </center>
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

		<footer style='text-align:center'>
			<p>&copy; <?php echo date('Y'); ?> Powered by OOBC<sup>&reg;</sup></p>
		</footer>
	
	<script src="admin/vendors/jquery-1.9.1.min.js"></script>
	<script src="admin/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
	<script src="admin/assets/scripts.js"></script>
	<script>
		$(function() {
			// Easy pie charts
			$('.chart').easyPieChart({animate: 1000});
		});
	</script>
		<!-- data table -->
	<script src="admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
	<script src="admin/assets/DT_bootstrap.js"></script>		
			<!-- jgrowl -->
		<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>   
				<script>
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
			<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<link href="admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
			<link href="admin/vendors/chosen.min.css" rel="stylesheet" media="screen">
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
		<link rel="stylesheet" type="text/css" href="admin/assets/style.css" />
			<script type="text/javascript">
			$(function() {
				$('#da-thumbs > li').hoverdir();
			});
			</script>
			<script src="admin/vendors/fullcalendar/fullcalendar.js"></script>
			<script src="admin/vendors/fullcalendar/gcal.js"></script>
			<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<script src="admin/vendors/bootstrap-datepicker.js"></script>
			<script>
				$(function() {
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