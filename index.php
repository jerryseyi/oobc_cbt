<?php
	$msg = "<font color=black><b><i>Succesfully registered</i></b></font>";
?>

<!DOCTYPE html>
<html class="no-js">
<head>
	<title>OOBC CBT Exam</title>
	<meta name="description" content="Ore-Ofe Oluwa Baptist Church Computer Based Exam Platform">
	<meta name="author" content="Access2emma">
	<meta charset="UTF-8">
	<!-- Bootstrap -->
	<link href="admin/images/favicon.ico" rel="icon" type="image">
	<link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<link href="admin/bootstrap/css/nivoslider.css" rel="stylesheet"/>
	<link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
	<link href="admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen"/>
	<link href="admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen"/>
	<link href="admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen"/>
	<link href="admin/assets/styles.css" rel="stylesheet" media="screen"/>
	<!-- calendar css -->
	<link href="admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
	<!-- index css -->
	<link href="admin/bootstrap/css/index.css" rel="stylesheet" media="screen"/>
	<!-- data table css -->
	<link href="admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen"/>
	<!-- notification  -->
	<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
	<!-- wysiwug  -->
	<link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"/>
	<script src="admin/vendors/jquery-1.9.1.min.js"></script>
	<script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body id="login">
    <div class="container">
		<div class="row-fluid">
			<div class="span6"><!--block-->
				<div class="title_index">				
					<div class="row-fluid">
						<div class="span12">
						</div>
					</div>
					<div class="row-fluid">
						<div class="span4">
							<img class="index_logo" src="admin/images/favicon.jpeg">
						</div>	
						<div class="span8">
							<div class="title">
								<p class="chmsc">OOBC | Computer Based Test Platform</p>
							</div>
						</div>							
					</div>
					<div class="row-fluid">
						<div class="span12">
						<br>
							<div class="slider">
								<div class="nivoSlider" id="slider">
									<img src="slider/slider1.jpg" />
									<img src="slider/slider2.jpg" />
									<img src="slider/slider3.jpg" />
									<img src="slider/slider4.jpg" />
									<img src="slider/slider5.jpg" />
									<img src="slider/slider6.jpg" />
									<img src="slider/slider7.jpg" />
									<img src="slider/slider8.jpg" />
									<img src="slider/slider9.jpg" />
									<img src="slider/slider10.jpg" />
									<img src="slider/slider11.jpg" />
									<img src="slider/slider12.jpg" />
									<img src="slider/slider13.jpg" />
									<img src="slider/slider14.jpg" />
									<img src="slider/slider15.jpg" />
									<img src="slider/slider16.jpg" />
									<img src="slider/slider17.jpg" />
									<img src="slider/slider18.jpg" />
									<img src="slider/slider19.jpg" />
								</div>
							</div>
							<div class="motto">
								<p>Randomized questions</p>
								<p>Over 100 Multiple choice questions</p>
								<p>Over 20 Structural questions</p>
								<p>Safe, Fast, Easy to use</p>
								
							</div>
						</div>		
					</div>
				</div>
			
			</div><!--/block-->
			<div class="span6"><!--block-->
				<div class="pull-right">
					<div><?php if(isset($_GET['msg'])){echo $msg;}?></div>
					<form id="login_form1" class="form-signin" action="login.php" method="post">
						<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign in</h3>
						<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
						<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
						<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#signin').tooltip('show');
								$('#signin').tooltip('hide');
							});
							</script>		
					</form>
					<div id="button_form" class="form-signin" >
					New to this platform?
					<hr>
						<h3 class="form-signin-heading"><i class="icon-edit"></i> Sign up</h3>
						<button data-placement="top" title="Sign Up for Membership" id="sign_up_m" onclick="window.location='signup.php'" id="btn_student" name="login" class="btn btn-info" type="submit">Join Us Now</button>
					</div>

					<div class='contact'>
						<p style="color:blue">For more Information,<p>
						<p>Contact Academics Unit</p>
						<p>Oore-ofe close, Stadium Area,</p>
						<p>Ogbomoso, Oyo State.</p>
					</div>
				</div>
			</div><!--/block-->
		</div>

	</div>
	<script src="js/jquery.js"></script>
	<script src="js/nivoslider.js"></script>
	<script>
	$(window).load(function() {
		$('#slider').nivoSlider({controlNav: false,               
			controlNavThumbs: false,        
			pauseOnHover: true,             
			manualAdvance: false,          
			prevText: '',               
			nextText: '',               
			randomStart: false           
			}
		);
	});
	</script>
</body>
</html>