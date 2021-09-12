<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>OOBC CBT <?php if(isset($title)) echo " | $title"; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Access2emma">
		<meta charset="UTF-8">
        <!-- Bootstrap -->
		<link href="admin/images/favicon.ico" rel="icon" type="image">
        <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
        <link href="admin/bootstrap/css/print.css" rel="stylesheet" media="print">
        <link href="admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="admin/assets/styles.css" rel="stylesheet" media="screen">
        <link href="admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
		<!-- calendar css -->
		<link href="admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
		<!-- index css -->
        <!-- <link href="admin/bootstrap/css/index.css" rel="stylesheet" media="screen"> -->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<script src="admin/vendors/jquery-1.9.1.min.js"></script>
        <script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<!-- data table -->
		<link href="admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">
		<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>
    </head>

    <body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
						<span class="icon-bar"></span><span class="icon-bar"></span>
					</a>
					<a class="brand" href="dashboard.php"><img alt="OOBC Logo" src="admin/images/Logo.png" style="height:30px;"> OOBC | Computer Based Test Platform</a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<li class="dropdown">
								<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $me['Fullname']; ?> <i class="caret"></i></a>
									<ul class="dropdown-menu">
										<li><a tabindex="-1" href="change_password.php"><i class="icon-circle"></i> Change Password</a></li>
										<li><a tabindex="-1" href="#myModal_student" data-toggle="modal"><i class="icon-picture"></i> Change Avatar</a></li>
										<li class="divider"></li>
										<li>
											<a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a>
										</li>
									</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Modal -->
		<div id="myModal_student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Change Avatar</h3>
			</div>
			<form method="post" action="student_avatar.php" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="text-align: center">
						<div class="control-group">
							<div class="controls">
								<input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
							</div>
						</div>
					</div>			
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
					<button class="btn btn-info" name="change"><i class="icon-save icon-large"></i> Save</button>
				</div>
			</form>
		</div>
		<!--/Modal-->