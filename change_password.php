<?php
	require('core/init.php');

    $currentPage = $_SERVER["PHP_SELF"];
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
				echo "<script>alert(\"Password has been changed!\");</script>
				<script>setTimeout(function(){ window.location = 'dashboard.php'  }, 300);  </script>";
//				header("Location: dashboard.php");
		}
	}
?>
<?php
$title = "Change Password";
require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Update Password</h2>
        </div>

        <div class="add-form">
            <form action="<?= $currentPage ?>" method="post">
                <div class="input-group mb-10">
                    <div class="input-box w-80 sm-mb-90 mb-0">
                        <label for="" style="margin-bottom: 10px">Current Password</label>
                        <div class="input-text-position"><input type="password" name="current_password" placeholder="Type current password"><span></span></div>
                    </div>
                </div>
                <div class="input-group mb-10">
                    <div class="input-box w-80 sm-mb-90 mb-0">
                        <label for="" style="margin-bottom: 10px">New Password</label>
                        <div class="input-text-position"><input type="password" name="new_password" placeholder="Input new password"><span></span></div>
                    </div>
                </div>
                <div class="input-group mb-10">
                    <div class="input-box w-80 sm-mb-90 mb-0">
                        <label for="" style="margin-bottom: 10px">Re-type New Password</label>
                        <div class="input-text-position"><input type="password" name="retype_password" placeholder="Input new password again"><span></span></div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="submit" name="submit" value="Update" id="">
                </div>
            </form>

            <?php include "footer.php";?>