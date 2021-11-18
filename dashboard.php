<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$page = 0;
	$per_page = 10;

	if (isset($_GET['pageNum_two'])) {
		$page = $_GET['pageNum_two'];
	}

	$session_time = "-1";

	if (isset($_SESSION['time'])) {
		$session_time = $_SESSION['time'];
	}

	$time = time();
	$exam_query_string = "SELECT * FROM exam WHERE start_date < '$time' AND close_date > '$time'";
	$exam_query = mysqli_query($local, $exam_query_string) or die(mysqli_error($local));
	
	$total_record_num = mysqli_num_rows($exam_query);
	
	$general->logged_out_protect();

	$me = $users->userdata($_SESSION['id']);


	$isAdmin= false;

	if($me['role'] == 1){
		$isAdmin= true;
	}

	
	$title = ".::Home::.";
	require_once("header.php");
?>


            <?php if ($isAdmin == false): ?>
                <div class="details">
                    <div class="recentOrders" style="display: flex; justify-content: center; flex-wrap: wrap">
                        <div class="cardHeaderExt">
                            <h2>Available Test</h2>
                        </div>

                        <?php if($total_record_num == 0): ?>
                            <p>No record found.</p>
                        <?php else: ?>

                        <?php while($exam_record = mysqli_fetch_assoc($exam_query)): ?>
                                <?php
                                $thir = $cbt->fetchDone($_SESSION['id'], $exam_record['exam_id']);

                                if(count($thir) >= 1){
                                    $msg="Attempted";
                                }else{
                                    $msg='<a href="#" onClick="if(confirm(\'Are you sure you want to attempt test?\')){ window.location= \'attempt.php?exam_id='.$exam_record['exam_id'].'\'; } else{ window.location= \'dashboard.php\';}"> Attempt test</a>';
                                }
                                ?>
                            <div class="apps-list">
                                <div class="apps-group">
                                    <div class="apps-text">
                                        <h3><?= $exam_record['exam_name']?></h3>
                                        <p>Only one attempt is allowed and you'll have <?= $exam_record['number_of_question']?> questions to for <?= $exam_record['time_allowed']?> minutes.</p>
                                        <?= $msg; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
            <?php else: ?>
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers">1,000</div>
                            <div class="cardName">Users</div>
                        </div>
                        <div class="iconBox">
                            <i class="fas fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">20</div>
                            <div class="cardName">Tutors</div>
                        </div>
                        <div class="iconBox">
                            <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">8</div>
                            <div class="cardName">Exams available</div>
                        </div>
                        <div class="iconBox">
                            <i class="fas fa-laptop-house" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">35</div>
                            <div class="cardName">Students</div>
                        </div>
                        <div class="iconBox">
                            <i class="fas fa-user-friends" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <div class="card-set">
                                <p class="card-text">Make sure the <a href="settings.html">Session and Semester settings</a> are both correct to avoid any error.</p>
                                <p>Please select a menu to manage at the sidebar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


	<?php include "footer.php" ?>

<?php mysqli_free_result($exam_query); ?>
