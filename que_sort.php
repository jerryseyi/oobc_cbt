<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$maxRows_one = 20;
	$pageNum_one = 0;
	if (isset($_GET['pageNum_one'])) {
		$pageNum_one = $_GET['pageNum_one'];
	}

	$startRow_one = $pageNum_one * $maxRows_one;

	$query_one = "SELECT * FROM exam";

	$query_limit_one = sprintf("%s LIMIT %d, %d", $query_one, $startRow_one, $maxRows_one);

	$one = mysqli_query($local, $query_limit_one) or die(mysqli_error($local));
	$row_one = mysqli_fetch_assoc($one);
	

	if (isset($_GET['totalRows_one'])) {
		$totalRows_one = $_GET['totalRows_one'];
	} else {
		$all_one = mysqli_query($local, $query_one);
		$totalRows_one = mysqli_num_rows($all_one);
	}

	$totalPages_one = ceil($totalRows_one/$maxRows_one)-1;

	$general->logged_out_protect();

	$me= $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}
	if($isAdmin == false){
		header('Location:dasboard.php');
		exit();
	}

	$title = "Question";
	require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Select Subject</h2>
        </div>
        <table>
            <thead>
            <tr>
                <td>Exam</td>
                <td>Number of Questions Available</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
                <?php do {
                $count = $cbt->countQue($row_one['exam_id']);
                ?>
                <tr>
                    <td><?php echo $row_one['exam_name']; ?></td>
                    <td><?php echo count($count); ?></td>
                    <td><a href="que_m.php?exam_id=<?php echo $row_one['exam_id']; ?>" class="status delivered">View questions</a></td>
                </tr>
                <?php } while ($row_one = mysqli_fetch_assoc($one)); ?>
            </tbody>
        </table>

        <?php include "footer.php"?>
<?php
mysqli_free_result($one);
?>
