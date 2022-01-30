<?php

require_once('Connections/local.php');
require('core/init.php');

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

$general->logged_out_protect();
$me= $users->userdata($_SESSION['id']);
if($me['role'] == 1)
{
    $isAdmin= true;
}


$query_sess = "SELECT * FROM session";
$sess = mysqli_query($local, $query_sess) or die(mysql_error());
$row_sess = mysqli_fetch_assoc($sess);
$totalRows_sess = mysqli_num_rows($sess);
?>
<?php
require_once('core/init.php');
//$general->logged_in_protect();
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
	
//	echo 'Here is some more debugging info:';
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
        echo "<script>alert(\"User registered successfully!\");
            setTimeout(function(){ window.location = 'dashboard.php'  });  </script>";
		exit();
	}
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<section class="login">
        <div class="logowrap" style="position:absolute !important; left: 20px; top: 10px;">
            <a href="dashboard.php" class="logo"><img src="img/OOBC%20LOGO.png" alt=""></a>
        </div>

    <div class="contentBx redbg">
        <h2>Register new user. </h2>
        <div class="form">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="inputBx">
                    <input type="text" placeholder="First Name" name="firstname">
                </div>
                <div class="inputBx">
                    <input type="text" placeholder="Last Name" name="lastname">
                </div>
                <div class="inputBx">
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="inputBx">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="inputBx">
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
                </div>
                <div class="inputBx">
                    <input type="file" name="file" required>
                </div>

                <div class="inputBx">
                    <input type="submit" name="register" value="Register">
                </div>
            </form>

        </div>
    </div>
    <div class="imgBx2"></div>
</section>
</body>
</html>

<?php
mysqli_free_result($sess);
?>