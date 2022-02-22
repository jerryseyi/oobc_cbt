<?php require_once('Connections/local.php'); ?>
<?php
	require('core/init.php');
	$general->logged_out_protect();
	$me= $users->userdata($_SESSION['id']);
	if($me['role'] == 1)
	{
		$isAdmin= true;
	}
	if($isAdmin == false)
	{
		header('Location:dasboard.php');
		exit();
	}
	if(isset($_GET['id']))
	{
		$id= intval($_GET['id']);
	}
	$current_semester = $cbt->getCurrentSemester();
	$result= $cbt->fetchMyResult($id, $current_semester->semester_id);
	$student_data = $users->userdata($id);
	$getS= $cbt->getSession($student_data['session_id']);
?>

<?php
$title = ucwords($student_data['Fullname'])."'s Result";
require_once("header.php");
?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>OOBC CBT</h2>
            <a href="#" class="btn">Students Semester Result</a>
        </div>

        <div style="display: flex; flex-wrap: wrap;">
            <div id="image">
                <img src="<?php echo $student_data['photo'] ?>" alt="Student's Image" width=250>
                <h3 class="mb-10">Name: <?php echo ucwords($student_data['Fullname']); ?></h3>
                <p class="mb-5">Session: <?php echo $getS['session_name']; ?></p>
                <p class="mb-5">Semester: <?php echo $cbt->getCurrentSemester()->semester; ?></p>
                <p>100 L</p>
            </div>
        </div>

        <table>
            <thead>
            <tr>
                <td>S/N</td>
                <td>Exam Name</td>
                <td>Result</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if(count($result) > 0)
            {
                $count = 1;
                foreach($result as $results)
                {
                    $exam = $cbt->examByIds($results['exam_id']);
                    echo "\n<tr style='border:1px double #ccc;'>\n
			   <td>". $count++."</td>
			   <td>".$exam['exam_name']."</td>
			   <td><font color=green>".$results['score']."%"."</font> </td>\n
			   </tr>";
                }
            }else{
                echo "<td colspan=2>No Result Found!</td>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>

		<footer>		
		<div class='result_page'>&copy; <?= date('Y');?>. Powered by OOBC<sup>&reg;</sup></div>
		</footer>
    </body>
</html>
