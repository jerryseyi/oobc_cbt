<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	if($isAdmin == false){
		header('Location:dasboard.php');
		exit();
	}
	
	if(!isset($_GET['id'])) header("Location: dashboard.php");

	$u_id = (int)$_GET['id'];

	$u_data = $users->userdata($u_id);

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$fullname = $_POST['fullname'];
		
		$sql = "UPDATE users SET username = '$username', fullname = '$fullname'";
		if(isset($_POST['password']) && strlen($_POST['password']) > 0){
			$password = $general->hashed($_POST['password']);
			$sql .= ", password = '$password' ";
		}
		$sql .= "where id=$u_id";

		$result = mysqli_query($local, $sql);

		if($result){
			header("Location: dashboard.php");
		}else{
			Die("Unable to Update this User at this time.... Please try again later!");
		}
		
	}

	$title = "Edit User";
	require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Edit User</h2>
            <a href="add_sess.php" class="btn">Add New Session</a>
        </div>

        <div class="add-form">
            <form method="post" name="form1" action="">
                <div class="input-group">
                    <div class="input-box w-90 sm-mb-90 mb-0">
                        <label for="">Username</label>
                        <div class="input-text-position">
                            <input type="text" value="<?php echo htmlentities($u_data['username'], ENT_COMPAT, 'UTF-8'); ?>">
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box w-90 sm-mb-90 mb-0">
                        <label for="">Username</label>
                        <div class="input-text-position">
                            <input type="text" value="<?php echo htmlentities($u_data['Fullname'], ENT_COMPAT, 'UTF-8'); ?>">
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box w-90 sm-mb-90 mb-0">
                        <label for="">Password</label>
                        <div class="input-text-position">
                            <input type="password" name="password" placeholder="leave blank if you don't want to change the password">
                        </div>
                    </div>
                </div>
                <div class="input-group flex">
                    <input type="submit" name="submit" class="px-20" value="Update Record" id="">
                    <input type="button" name="" value="Back" id="" class="px-20 btn-gray" onclick="history.back()">
                </div>
                <input type="hidden" name="MM_insert" value="form1">
            </form>

            <?php include "footer.php"?>
<!--            --><?php
//            mysqli_free_result($Recordset1);
//            ?>

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