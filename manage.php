<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$maxRows_two = 10;
	$pageNum_two = 0;

	if (isset($_GET['pageNum_two'])) {
		$pageNum_two = $_GET['pageNum_two'];
	}

	$startRow_two = $pageNum_two * $maxRows_two;

	$query_two = "SELECT * FROM exam ORDER BY exam_id DESC";
	$query_limit_two = sprintf("%s LIMIT %d, %d", $query_two, $startRow_two, $maxRows_two);
	$two = mysqli_query($local, $query_limit_two) or die(mysqli_error($local));
	$row_two = mysqli_fetch_assoc($two);

	if (isset($_GET['totalRows_two'])) {
		$totalRows_two = $_GET['totalRows_two'];
	} else {
		$all_two = mysqli_query($local, $query_two);
		$totalRows_two = mysqli_num_rows($all_two);
	}

	$totalPages_two = ceil($totalRows_two/$maxRows_two)-1;

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}
	
	$title = "Manage Exam";
	require_once("header.php");
?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Available Exams</h2>
            <a href="add_exam.php" class="btn">Add New Exams</a>
        </div>
        <table>
            <thead>
            <tr>
                <td>S/N</td>
                <td>Exam Name</td>
                <td>Time Allowed</td>
                <td>Number of Question</td>
                <td>Exam Description</td>
                <td>Start Date</td>
                <td>Close Date</td>
                <td>Date Added</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $nos = 1;
            do { ?>
                <tr  style="border:1px double #ccc;">
                    <td><?= $nos ?></td>
                    <td><?= $row_two['exam_name']; ?></td>
                    <td><?= $row_two['time_allowed']; ?></td>
                    <td><?= $row_two['number_of_question']; ?></td>
                    <td><?= $row_two['exam_desc']; ?></td>
                    <td><?= date("d/m/Y", $row_two['start_date']); ?></td>
                    <td><?= date("d/m/Y", $row_two['close_date']); ?></td>
                    <td><?= date("d/m/Y", $row_two['date_added']); ?></td>
                    <td><a href="edit_exam.php?exam_id=<?= $row_two['exam_id']; ?>" class="status delivered">Edit</a>
                        <a href="del_exam.php?exam_id=<?= $row_two['exam_id']; ?>" class="status return">Delete</a>
                    </td>
                </tr>
                <?php $nos++; } while ($row_two = mysqli_fetch_assoc($two)); ?>
            </tbody>
        </table>
        <?php include "footer.php"?>
<?php
	mysqli_free_result($two);
?>
