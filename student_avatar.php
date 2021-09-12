<?php

require('core/init.php');
$general->logged_out_protect();
$me= $users->userdata($_SESSION['id']);
	
if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
	$file = $_FILES['image'];
	if($file['error'] === 0 && !file_exists("upload/". $file["name"])){
		move_uploaded_file($file["tmp_name"],"upload/". $file["name"]);
		$pat ="upload/". $file["name"];
			 
		$users->changeAvater($me['id'], $pat);
		echo "<script>alert(\"Avarter has been changed!\");
		setTimeout(function(){ window.location = 'dashboard.php'  }, 500);  </script>";			 
	}else{
		echo "<script>alert(\"Avarter Upload Failed!\");
		setTimeout(function(){ window.location = 'dashboard.php'  }, 500);  </script>";	
	}
	
}else{
	header('Location: dashboard.php');
}
?>