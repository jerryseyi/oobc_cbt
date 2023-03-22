<?php
require_once('Connections/local.php');
require 'core/init.php';

$general->logged_in_protect();

if (isset($_POST['login']) ) {
	$email = htmlentities($_POST['username']);
	$password = trim(mysqli_real_escape_string($local, $_POST['password']));
	$pass = $general->hashed($password);

	if (empty($email) === true || empty($email) === true) {
		$errors[] = 'Please provide your username and password.';
	} else if ($users->user_exists($email) === false) {
		$errors[] = 'Sorry that email doesn\'t exists.';
	} else {
		if (strlen($password) > 30) {
			$errors[] = 'The password should be less than 18 characters, without spacing.';
		}

		$login = $users->login($email, $pass);

		if ($login === false) {
			$errors[] = 'Sorry, that username/password is invalid';
		}else {
			$_SESSION['id'] =  $login;

			if(isset($_GET['returnurl'])){
				header('Location:'. urldecode($_GET['returnurl']));
			}else {
				header('Location: dashboard.php');
				exit();
			}
		}
	}
}else{
	header('Location: index.php');
}

if(empty($errors) === false){
?>
	<div id="logbox">
		<div class="error">
<?php
        $error = '<p>' . implode('</p><p>', $errors) . '</p>';
        return view('signin', compact('error'));

	}
?>
		</div>
	</div>