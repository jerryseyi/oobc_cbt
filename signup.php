<?php

require_once('Connections/local.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

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

$query_sess = "SELECT * FROM session";
$sess = mysqli_query($local, $query_sess) or die(mysql_error());
$row_sess = mysqli_fetch_assoc($sess);
$totalRows_sess = mysqli_num_rows($sess);
?>
<?php
require_once('core/init.php');
$general->logged_in_protect();
require_once('core/functions.php');
if (isset($_POST['register'])) {

	if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['session'])){
		$errors[] = 'All fields are required.';
	}else{
        if(!ctype_alnum($_POST['firstname'])==true){
            $errors[] = 'Please enter a name with only alphabets';	
        }
		if(!ctype_alnum($_POST['lastname'])==true){
            $errors[] = 'Please enter a name with only alphabets';	
        }
        if (strlen($_POST['password']) <6){
            $errors[] = 'Your pass must be atleast 6 characters';
        } else if (strlen($_POST['password']) >18){
            $errors[] = 'Your password cannot be more than 18 characters long';
        }
       if ($users->user_exists($_POST['username']) === true) {
            $errors[] = 'That user already exists.';
        }
	}
	if(empty($errors) === false){
		echo '<p style="margin-left:10px;"><font color="#993300">' . implode('</p><p>', $errors) . '</font></p>';	
	}

	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/". $_FILES["file"]["name"]);
	$pat ="upload/". $_FILES["file"]["name"];
	
	echo 'Here is some more debugging info:';
	if(empty($errors) === true){
		$fimage = $pat;
		$session= $_POST['session'];
		$password 	= $_POST['password'];
		$username 	= $_POST['username'];
		$firstname 	= htmlentities($_POST['firstname']);
		$lastname 	= htmlentities($_POST['lastname']);
		$hashed_pass = $general->hashed($password);
		$fullname= $firstname.' '.$lastname; 
		$users->register($fullname, $username, $hashed_pass, $fimage, $session);
		header('Location: index.php?msg=1');
		exit();
	}
}

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
			<div class="span6"><div class="title_index">				
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
							<p class="chmsc">Computer based test Platform</p>
							<h3>

							<p>Overcomer's Test Engine</p>
						
							</h3>		
						</div>
			
						</div>							
							</div>
				
				<div class="row-fluid">

						<div class="span12">
						<br>
								<div class="motto">
									<p>Exam management system:</p>
									<p>Randomized questions</p>
									<p>Over 100 Multipe choice questions</p>
									<p>Over 20 Stuctural questions</p>
									<p>Safe, Fast, Easy to use</p>
									<p>For more Information,</p>
									<p>Contact Academics Unit</p>
									<p>Oore-ofe close, Stadium Area</p>
								</div>		
						</div>		
				</div></div></div>
			<div class="span6"><div class="pull-right"><form id="signup_user" action="" class="form-signin" method="post" enctype="multipart/form-data">
			<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as New User</h3>
			<input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Firstname" required>
			<input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Lastname" required>
			<input type="text" class="input-block-level" id="username"  value="" name="username" placeholder="Username" required>
			<input type="password" class="input-block-level" id="password" value="" name="password" placeholder="Password" required>
            <select name="session">
            <option value="">Select academic year</option>
              <?php
do {  
?>
              <option value="<?php echo $row_sess['session_id']?>"><?php echo $row_sess['session_name']?></option>
              <?php
} while ($row_sess = mysqli_fetch_assoc($sess));
  $rows = mysqli_num_rows($sess);
  if($rows > 0) {
      mysqli_data_seek($sess, 0);
	  $row_sess = mysqli_fetch_assoc($sess);
  }
?>
            </select>
			<input type="file" name="file" required>
			<button id="signin" name="register" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Sign up</button>
			</form>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#sign_up_m').tooltip('show'); $('#sign_up_m').tooltip('hide');
														});
														</script>	
</div></div>
		</div>
		<div class="row-fluid">
			<div class="span12"><div class="index-footer">

               </div>
           </div>
</div>

	</div></div>
		</div>
    </div>
    <?php
mysqli_free_result($sess);
?>
