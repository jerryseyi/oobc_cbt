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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_four = 10;
$pageNum_four = 0;
if (isset($_GET['pageNum_four'])) {
  $pageNum_four = $_GET['pageNum_four'];
}
$startRow_four = $pageNum_four * $maxRows_four;

$query_four = "SELECT * FROM `session` ORDER BY session_id DESC";
$query_limit_four = sprintf("%s LIMIT %d, %d", $query_four, $startRow_four, $maxRows_four);
$four = mysqli_query($local, $query_limit_four) or die(mysql_error());
$row_four = mysqli_fetch_assoc($four);

if (isset($_GET['totalRows_four'])) {
  $totalRows_four = $_GET['totalRows_four'];
} else {
  $all_four = mysqli_query($local, $query_four);
  $totalRows_four = mysqli_num_rows($all_four);
}
$totalPages_four = ceil($totalRows_four/$maxRows_four)-1;

$queryString_four = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_four") == false && 
        stristr($param, "totalRows_four") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_four = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_four = sprintf("&totalRows_four=%d%s", $totalRows_four, $queryString_four);
?>
<?php
	require('core/init.php');
	$general->logged_out_protect();
	$me= $users->userdata($_SESSION['id']);
	if($me['role'] == 1)
	{
		$isAdmin= true;
	}
	if($isAdmin == false)
	{
		header('Location:dasboard.php');
		exit();
	}
?>

<?php
$title = "Session";
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
                                        
                                        <?php if ($totalRows_four > 0) { // Show if recordset not empty ?>
  <table class="exam-table" width="100%">
    <tr>
      <th>Academic session</th>
      <th colspan="2">Actions</th>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_four['session_name']; ?></td>
         <td><a href="view_s.php?session_id=<?php echo $row_four['session_id']; ?>">View records</a></td>
      </tr>
      <?php } while ($row_four = mysqli_fetch_assoc($four)); ?>
  </table>
  <table border="0">
  <tr>
    <td><?php if ($pageNum_four > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_four=%d%s", $currentPage, 0, $queryString_four); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_four > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_four=%d%s", $currentPage, max(0, $pageNum_four - 1), $queryString_four); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_four < $totalPages_four) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_four=%d%s", $currentPage, min($totalPages_four, $pageNum_four + 1), $queryString_four); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_four < $totalPages_four) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_four=%d%s", $currentPage, $totalPages_four, $queryString_four); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
Records <?php echo ($startRow_four + 1) ?> to <?php echo min($startRow_four + $maxRows_four, $totalRows_four) ?> of <?php echo $totalRows_four ?> </div>
  <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_four == 0) { // Show if recordset empty ?>
    No record found
  <?php } // Show if recordset empty ?>
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
mysqli_free_result($four);
?>
