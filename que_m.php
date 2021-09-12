<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

  	$currentPage = $_SERVER["PHP_SELF"];

  	$maxRows_rec = 20;
	$pageNum_rec = 0;

	if (isset($_GET['pageNum_rec'])) {
		$pageNum_rec = $_GET['pageNum_rec'];
	}

	$startRow_rec = $pageNum_rec * $maxRows_rec;

	$colname_rec = "-1";
	if (isset($_GET['exam_id'])) {
		$colname_rec = $_GET['exam_id'];
	}

	$query_rec = sprintf("SELECT * FROM question WHERE exam_id = %s ORDER BY que_id DESC", GetSQLValueString($colname_rec, "int"));
	$query_limit_rec = sprintf("%s LIMIT %d, %d", $query_rec, $startRow_rec, $maxRows_rec);
	
	$rec = mysqli_query($local, $query_limit_rec) or die(mysql_error($local));
	$row_rec = mysqli_fetch_assoc($rec);

	if (isset($_GET['totalRows_rec'])) {
	$totalRows_rec = $_GET['totalRows_rec'];
	} else {
	$all_rec = mysqli_query($local, $query_rec);
	$totalRows_rec = mysqli_num_rows($all_rec);
	}
	$totalPages_rec = ceil($totalRows_rec/$maxRows_rec)-1;

	$queryString_rec = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
	$params = explode("&", $_SERVER['QUERY_STRING']);
	$newParams = array();
	foreach ($params as $param) {
		if (stristr($param, "pageNum_rec") == false && 
			stristr($param, "totalRows_rec") == false) {
		array_push($newParams, $param);
		}
	}
	if (count($newParams) != 0) {
		$queryString_rec = "&" . htmlentities(implode("&", $newParams));
	}
	}
	$queryString_rec = sprintf("&totalRows_rec=%d%s", $totalRows_rec, $queryString_rec);

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
$title = "Manage Question";
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
                                            <div class="pull-right"><i class="icon-plus"></i> <a href="add_que.php?exam_id=<?php echo $colname_rec ?>">Add new question</a></div>
										</div>
										<div id='calendar'>
                                        <style>
										
										</style>
                                        <?php $i=1; ?>
                                        <table class="exam-table" border="1" width="100%" style="margin-top:10px;">
                                          <tr>
                                            <th>S/N</th>
                                            <th>Question</th>
                                            <th>opt_A</th>
                                            <th>opt_B</th>
                                            <th>opt_C</th>
                                            <th>opt_D</th>
                                            <th>Answer</th>
                                            <th colspan=2>Actions</th>
                                          </tr>
                                          <?php do { ?>
                                            <tr>
                                              <td><?php echo $i; ?></td>
                                              <td><?php echo $row_rec['question']; ?></td>
                                              <td><?php echo $row_rec['opt_A']; ?></td>
                                              <td><?php echo $row_rec['opt_B']; ?></td>
                                              <td><?php echo $row_rec['opt_C']; ?></td>
                                              <td><?php echo $row_rec['opt_D']; ?></td>
                                              <td><?php echo $row_rec['ans']; ?></td>
                                              <td width="5%"> <a href="edit_que.php?que_id=<?php echo $row_rec['que_id']; ?>&exam_id=<?php echo $colname_rec?>"><i class="icon-edit"></i> Edit</a></td>
                                                 <td width="7%"> <a href="del_que.php?que_id=<?php echo $row_rec['que_id']; ?>&exam_id=<?php echo $colname_rec?>" onClick="return confirm('Are u sure you want to delete this question? ')"><i class="icon-trash"></i> Delete</a></td>
                                            </tr>
                                            <?php $i= $i+1; } while ($row_rec = mysqli_fetch_assoc($rec)); ?>
                                        </table>
										Records <?php echo ($startRow_rec + 1) ?> to <?php echo min($startRow_rec + $maxRows_rec, $totalRows_rec) ?> of <?php echo $totalRows_rec ?> 
                                        <table border="0">
                                          <tr>
                                            <td><?php if ($pageNum_rec > 0) { // Show if not first page ?>
                                                <a href="<?php printf("%s?pageNum_rec=%d%s", $currentPage, 0, $queryString_rec); ?>">First</a>
                                                <?php } // Show if not first page ?></td>
                                            <td><?php if ($pageNum_rec > 0) { // Show if not first page ?>
                                                <a href="<?php printf("%s?pageNum_rec=%d%s", $currentPage, max(0, $pageNum_rec - 1), $queryString_rec); ?>">Previous</a>
                                                <?php } // Show if not first page ?></td>
                                            <td><?php if ($pageNum_rec < $totalPages_rec) { // Show if not last page ?>
                                                <a href="<?php printf("%s?pageNum_rec=%d%s", $currentPage, min($totalPages_rec, $pageNum_rec + 1), $queryString_rec); ?>">Next</a>
                                                <?php } // Show if not last page ?></td>
                                            <td><?php if ($pageNum_rec < $totalPages_rec) { // Show if not last page ?>
                                                <a href="<?php printf("%s?pageNum_rec=%d%s", $currentPage, $totalPages_rec, $queryString_rec); ?>">Last</a>
                                                <?php } // Show if not last page ?></td>
                                          </tr>
                                        </table>
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
mysqli_free_result($rec);
?>
