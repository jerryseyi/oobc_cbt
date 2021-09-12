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

<div class="result_page">
	<header>
		<h1>OOBC CBT</h1>
		<p><u>STUDENTS SEMESTER RESULT</u></p>
	</header>
	<div class='stud-info'>
		<img src="<?php echo $student_data['photo'] ?>" alt="Student's Image" width=150>
		<table>
			<tr><th>NAME</th><td><?php echo ucwords($student_data['Fullname']); ?></td></tr>
			<tr><th>SESSION</th><td><?php echo $getS['session_name']; ?></td></tr>
			<tr><th>SEMESTER</th><td><?php echo $cbt->getCurrentSemester()->semester; ?></td></tr>
			<tr><th>LEVEL</th><td>100 L</td></tr>
		</table>
	</div>
	<div class='calendar'>
		<table>
			<tr><th width="70%">COURSE</th><th>SCORE</th></tr>
		<?php
		if(count($result) > 0)
		{
			foreach($result as $results)
			{
				$exam = $cbt->examByIds($results['exam_id']);
			   echo "\n<tr>\n
			   <td>".$exam['exam_name']."</td>
			   <td><font color=green>".$results['score']."%"."</font> </td>\n
			   </tr>";
			}
		}else{
			echo "<td colspan=2>No Result Found!</td>";
		}
		?>
		</table>
	</div>
</div>

		<footer>		
		<div class='result_page'>&copy; 2015. Powered by OOBC<sup>&reg;</sup></div>
		</footer>
    </body>
</html>
