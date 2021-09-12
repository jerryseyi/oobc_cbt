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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE `result` SET user_id=%s, exam_id=%s, score=%s WHERE result_id=%s",
                       GetSQLValueString($_POST['user_id'], "undefined"),
                       GetSQLValueString($_POST['exam_id'], "undefined"),
                       GetSQLValueString($_POST['score'], "int"),
                       GetSQLValueString($_POST['result_id'], "int"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());

  $updateGoTo = "result_m.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_ten = "-1";
if (isset($_GET['result_id'])) {
  $colname_ten = $_GET['result_id'];
}
mysql_select_db($database_local, $local);
$query_ten = sprintf("SELECT * FROM `result` WHERE result_id = %s", GetSQLValueString($colname_ten, "int"));
$ten = mysql_query($query_ten, $local) or die(mysql_error());
$row_ten = mysql_fetch_assoc($ten);
$totalRows_ten = mysql_num_rows($ten);
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
$title = "Add Question";
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
											<div class="muted pull-left">Available Questions</div>
                                            <div class="pull-right"><i class="icon-plus"></i> <a href="add_que.php">Add new question</a></div>
										</div>
										<div id='calendar'>
                                          <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                                            <table align="center">
                                              <tr valign="baseline">
                                                <td nowrap align="right">User_id:</td>
                                                <td><?php echo htmlentities($row_ten['user_id'], ENT_COMPAT, 'UTF-8'); ?></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">Exam_id:</td>
                                                <td><?php echo htmlentities($row_ten['exam_id'], ENT_COMPAT, 'UTF-8'); ?></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">Score:</td>
                                                <td><input type="text" name="score" value="<?php echo htmlentities($row_ten['score'], ENT_COMPAT, 'UTF-8'); ?>" size="32"></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">&nbsp;</td>
                                                <td><input type="submit" value="Update record"></td>
                                              </tr>
                                            </table>
                                            <input type="hidden" name="MM_update" value="form1">
                                            <input type="hidden" name="result_id" value="<?php echo $row_ten['result_id']; ?>">
                                          </form>
                                          <p>&nbsp;</p>
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
		
		<p>&copy; 2015. Powered by OOBC<sup>&reg;</sup></p>
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
mysqli_free_result($ten);
?>
