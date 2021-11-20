<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$general->logged_out_protect();

	$me = $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	$title = "Settings";
	require_once("header.php");
?>


    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Settings</h2>
            </div>

            <div class="add-form" onclick="toggleMenu()">
                <form action="" method="post">
                    <div class="input-group mb-10">
                        <div class="input-box w-80 sm-mb-90 mb-0">
                            <label for="" style="margin-bottom: 10px">Current Session</label>

                            <div class="input-text-position">
                                <select name="session" id="">
                                    <?php
                                    $current = $cbt->getCurrentSession();
                                    $sessions = $cbt->getAllSession();
                                    foreach($sessions as $session){
                                        $selected = ($session->session_id == $current->session_id) ? "selected" : "";
                                        echo "\n<option value='$session->session_id' $selected >$session->session_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-10">
                        <div class="input-box w-80 sm-mb-90 mb-0">
                            <label for="" style="margin-bottom: 10px">Current Semester</label>
                            <div class="input-text-position">
                                <select name="semester" id="">
                                    <?php
                                    $currents = $cbt->getCurrentSemester();
                                    $semesters = $cbt->getAllSemester();
                                    foreach($semesters as $semester){
                                        $selected = ($semester->semester_id == $currents->semester_id) ? "selected" : "";
                                        echo "\n<option value='$semester->semester_id' $selected >$semester->semester</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['save'])){
                        $current_session = (int) $_POST['session'];
                        $current_semester = (int) $_POST['semester'];

                        $cbt->setCurrentSession($current_session);
                        $cbt->setCurrentSemester($current_semester);
                        header("Location: dashboard.php");
                    }
                    ?>
                    <div class="input-group">
                        <input type="submit" name="save" value="Save" id="">
                    </div>
                </form>
            </div>
        </div>
    </div>


		<?php include "footer.php"?>