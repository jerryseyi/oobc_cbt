<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$editFormAction = $_SERVER['PHP_SELF'];

	if (isset($_SERVER['QUERY_STRING'])) {
	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$insertSQL = sprintf("INSERT INTO question (exam_id, question, opt_A, opt_B, opt_C, opt_D, ans) VALUES (%s, %s, %s, %s, %s, %s, %s)",
						GetSQLValueString($_POST['exam_id'], "int"),
						GetSQLValueString($_POST['question'], "text"),
						GetSQLValueString($_POST['opt_A'], "text"),
						GetSQLValueString($_POST['opt_B'], "text"),
						GetSQLValueString($_POST['opt_C'], "text"),
						GetSQLValueString($_POST['opt_D'], "text"),
						GetSQLValueString($_POST['ans'], "text"));

	$Result1 = mysqli_query($local, $insertSQL) or die(mysql_error());

	header(sprintf("Location: %s", $editFormAction));
	}

	$query_Recordset1 = "SELECT * FROM exam";
	$Recordset1 = mysqli_query($local, $query_Recordset1) or die(mysql_error($local));
	$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	if($isAdmin == false){
		header('Location:dasboard.php');
		exit();
	}

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
											<div class="muted pull-left">Add Questions</div>
                                            <div class="pull-right"><i class="icon-plus"></i> <a href="add_que.php">Add new question</a></div>
										</div>
										<div id='calendar'>
                                          <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                                            <table align="center">
                                              <tr valign="baseline">
                                                <td nowrap align="right">Exam:</td>
                                                <td>
													<select name="exam_id">
													  <?php 
													  do {
														  if(isset($_GET['exam_id']))
															  $select = ( $_GET['exam_id'] == $row_Recordset1['exam_id']) ? "selected" : "";
														  else
															  $select = "";
														  ?>
														  <option value="<?php echo $row_Recordset1['exam_id']?>" <?php echo $select ?> ><?php echo $row_Recordset1['exam_name']?></option> <?php
													  } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
													  ?>
													</select>
												</td>
                                              <tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">Question:</td>
                                                <td><textarea class='ckeditor' name="question" ></textarea></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">Opt_A:</td>
                                                <td><input type="text" name="opt_A" value="" size="32"></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">Opt_B:</td>
                                                <td><input type="text" name="opt_B" value="" size="32"></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">Opt_C:</td>
                                                <td><input type="text" name="opt_C" value="" size="32"></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">Opt_D:</td>
                                                <td><input type="text" name="opt_D" value="" size="32"></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">Ans:</td>
                                                <td><input type="text" name="ans" value="" size="32"></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap align="right">&nbsp;</td>
                                                <td><input type="submit" value="Insert record">
												<input type="button" onClick="history.back()" value="&raquo; Back"/></td>
                                              </tr>
                                            </table>
                                            <input type="hidden" name="MM_insert" value="form1">
                                          </form>
                                          <p>&nbsp;</p>
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
mysqli_free_result($Recordset1);
?>
