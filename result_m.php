<?php require_once('Connections/local.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_eight = 20;
$pageNum_eight = 0;
if (isset($_GET['pageNum_eight'])) {
  $pageNum_eight = $_GET['pageNum_eight'];
}
$startRow_eight = $pageNum_eight * $maxRows_eight;

mysql_select_db($database_local, $local);
$query_eight = "SELECT * FROM `result`";
$query_limit_eight = sprintf("%s LIMIT %d, %d", $query_eight, $startRow_eight, $maxRows_eight);
$eight = mysql_query($query_limit_eight, $local) or die(mysql_error());
$row_eight = mysql_fetch_assoc($eight);

if (isset($_GET['totalRows_eight'])) {
  $totalRows_eight = $_GET['totalRows_eight'];
} else {
  $all_eight = mysql_query($query_eight);
  $totalRows_eight = mysql_num_rows($all_eight);
}
$totalPages_eight = ceil($totalRows_eight/$maxRows_eight)-1;
?>
<?php
	require('core/init.php');
	$general->logged_out_protect();
	$me= $users->userdata($_SESSION['id']);
	if($me['role'] == 1)
	{
		$isAdmin= true;
	}
?>

<?php
$title = "Result";
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
											<div class="muted pull-left">Student's Results</div>
										</div>
										<div id='calendar'>
                                        <style>
										tr, td
										{
											border:1px solid #ededed;
										}
										td even-col
										{
											background:#333;
										}
										
										</style>
                                        <?php if ($totalRows_eight > 0) { // Show if recordset not empty ?>
  <table border="1">
    <tr>
      <td>result_id</td>
      <td>user_id</td>
      <td>exam_id</td>
      <td>score</td>
      <td>date_attempted</td>
      <td colspan="2"></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_eight['result_id']; ?></td>
        <td><?php echo $row_eight['user_id']; ?></td>
        <td><?php echo $row_eight['exam_id']; ?></td>
        <td><?php echo $row_eight['score']; ?></td>
        <td><?php echo $row_eight['date_attempted']; ?></td>
        <td width="5%"> <a href="edit_res.php?result_id=<?php echo $row_fourth['result_id']; ?>"><i class="icon-edit"></i> Edit</a></td>
                                                 <td width="7%"> <a href="del_res.php?result_id=<?php echo $row_fourth['result_id']; ?>" onClick=""><i class="icon-trash"></i> Delete</a></td>
      </tr>
      <?php } while ($row_eight = mysql_fetch_assoc($eight)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_eight == 0) { // Show if recordset empty ?>
    No record was found
  <?php } // Show if recordset empty ?>
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
		<center>
		<footer>
		
		<p>Cbt Copyright 2014</p>
		</footer>
</center>


        </div>
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
		<link rel="stylesheet" type="text/css" href="admin/assets//style.css" />
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
<?php
mysqli_free_result($eight);
?>
