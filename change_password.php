<?php
	require('core/init.php');
	$general->logged_out_protect();
	$me= $users->userdata($_SESSION['id']);
	if($me['role'] == 1)
	{
		$isAdmin= true;
	}
	
	if(isset($_POST['submit'])){
		$current_password = $_POST["current_password"];
		$nw_pw = $_POST["new_password"];
		$rt_pw = $_POST["retype_password"];
		
		if($general->hashed($current_password) == $me['password'] && $nw_pw == $rt_pw){
			$users->changePass($me['id'], $general->hashed($rt_pw));
				echo "<script>alert(\"Password has been changed!\");
				setTimeout(function(){ window.location = 'dashboard.php'  }, 5000);  </script>";
				header("Locaton: dashboard.php");
		}
	}
?>
<?php
$title = "Change Password";
require_once("header.php");
?>   
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<li><a href="#"><b>User</b></a><span class="divider">/</span></li>
								<li><a href="#">Change Password: </a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								<div class="alert alert-info"><i class="icon-info-sign"></i> Please Fill in required details</div>
												
										
								    <form  method="post" id="change_password" class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Current Password</label>
											<div class="controls">
											<input type="hidden" id="password" name="password" value="<?php echo $me['password']; ?>" >
											<input type="password" id="current_password" name="current_password"  placeholder="Current Password">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">New Password</label>
											<div class="controls">
											<input type="password" id="new_password" name="new_password" placeholder="New Password">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Re-type Password</label>
											<div class="controls">
											<input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
											<button name='submit' type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
											</div>
										</div>
									</form>
									
			<script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					//e.preventDefault();
						
					var password = jQuery('#password').val();
					var current_password = jQuery('#current_password').val();
					var new_password = jQuery('#new_password').val();
					var retype_password = jQuery('#retype_password').val();
					
					if  (new_password != retype_password){
						$.jGrowl("Password does not match with your new password  ", { header: 'Change Password Failed' });
					}else if ((password == current_password) && (new_password == retype_password)){
						/* var formData = jQuery(this).serialize();
						$.ajax({
							type: "POST",
							url: "update_password.php",
							data: formData,
							success: function(html){
								console.log(html);
								$.jGrowl("Your password is successfully change", { header: 'Change Password Success' });
								var delay = 2000;
								setTimeout(function(){ window.location = 'dasboard.php'  }, delay);  
							}
						}); */
						
						return true;
					}
				});
			});
			</script>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
	
            </div>
		<center>
		<footer>
		<p>&copy; 2016 Powered by OOBC<sup>&reg;</sup></p>
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