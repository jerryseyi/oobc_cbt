<?php

	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

	$currentPage = $_SERVER["PHP_SELF"];

	$maxRows_ree = 10;
	$pageNum_ree = 0;

	if (isset($_GET['pageNum_ree'])) {
		$pageNum_ree = $_GET['pageNum_ree'];
	}

	$startRow_ree = $pageNum_ree * $maxRows_ree;

	$colname_ree = "-1";
	if (isset($_GET['session_id'])) {
		$colname_ree = $_GET['session_id'];
	}

	$query_ree = sprintf("SELECT * FROM users WHERE session_id = %s", GetSQLValueString($colname_ree, "int"));
	$query_limit_ree = sprintf("%s LIMIT %d, %d", $query_ree, $startRow_ree, $maxRows_ree);

	$student_query = mysqli_query($local, $query_limit_ree) or die(mysql_error($local));

	$total_student_rows = mysqli_num_rows($student_query);

	if (isset($_GET['totalRows_ree'])) {
		$totalRows_ree = $_GET['totalRows_ree'];
	} else {
		$all_ree = mysqli_query($local, $query_ree);
		$totalRows_ree = mysqli_num_rows($all_ree);
	}
	$totalPages_ree = ceil($totalRows_ree/$maxRows_ree)-1;

	$queryString_ree = "";

	if (!empty($_SERVER['QUERY_STRING'])) {
		$params = explode("&", $_SERVER['QUERY_STRING']);

		$newParams = array();

		foreach ($params as $param) {
			if (stristr($param, "pageNum_ree") == false && 
				stristr($param, "totalRows_ree") == false) {
				array_push($newParams, $param);
			}
		}

		if (count($newParams) != 0) {
			$queryString_ree = "&" . htmlentities(implode("&", $newParams));
		}
	}

	$queryString_ree = sprintf("&totalRows_ree=%d%s", $totalRows_ree, $queryString_ree);

	$general->logged_out_protect();

	$me = $users->userdata($_SESSION['id']);

	if($me['role'] == 1){
		$isAdmin= true;
	}

	if($isAdmin == false){
		header('Location:dasboard.php');
		exit();
	}

	$title = "View Students";
	require_once("header.php");
?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Available Sessions</h2>
            <a href="add_sess.php" class="btn">Add New Session</a>
        </div>
        <table>
            <thead>
            <tr>
                <td>Photo</td>
                <td>Username</td>
                <td>Full Name</td>
                <td colspan=4>Action</td>
            </tr>
            </thead>
            <tbody>

                <?php if($total_student_rows == 0): ?>
                    <td colspan="4">No record found.</td>
                <?php else: ?>

                <?php while($row_ree = mysqli_fetch_assoc($student_query)): ?>
                    <tr>
                        <td width="80" height="100"><img src="<?= $row_ree['photo']; ?>" style="width:80px; height:100px;"></td>
                        <td><?= $row_ree['username']; ?></td>
                        <td><?= $row_ree['Fullname']; ?></td>
                        
                        <td><a href="edit_user.php?id=<?= $row_ree['id']; ?>" class="status delivered">Edit</a></td>
                        <td><a href="view.php?id=<?= $row_ree['id']; ?>" class="status pending">View result</a></td>

                        <?php
                            $usr = $users->userdata($row_ree['id']);

                            if( $usr['role'] == 0 ){
                                echo "<td><a href='makeadmin.php?action=make&session_id=".$row_ree['session_id']."&user_id=".$row_ree['id']."' title='Make Admin' class='status delivered'>Make Admin</a></td>";
                            }else{
                                echo "<td><a href='makeadmin.php?action=remove&session_id=".$row_ree['session_id']."&user_id=".$row_ree['id']."' title='Remove Admin' class='status delivered'>Remove Admin</a></td>";
                            }
                        ?>
                        
                    </tr>

                <?php endwhile; ?>

            <?php endif; ?>

                </table>

                Records <?= ($startRow_ree + 1) ?> to <?= min($startRow_ree + $maxRows_ree, $totalRows_ree) ?> of <?php echo $totalRows_ree ?>
                <table border="0">
                    <tr>
                    <td><?php if ($pageNum_ree > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_ree=%d%s", $currentPage, 0, $queryString_ree); ?>">First</a>
                        <?php } // Show if not first page ?></td>
                    <td><?php if ($pageNum_ree > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_ree=%d%s", $currentPage, max(0, $pageNum_ree - 1), $queryString_ree); ?>">Previous</a>
                        <?php } // Show if not first page ?></td>
                    <td><?php if ($pageNum_ree < $totalPages_ree) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_ree=%d%s", $currentPage, min($totalPages_ree, $pageNum_ree + 1), $queryString_ree); ?>">Next</a>
                        <?php } // Show if not last page ?></td>
                    <td><?php if ($pageNum_ree < $totalPages_ree) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_ree=%d%s", $currentPage, $totalPages_ree, $queryString_ree); ?>">Last</a>
                        <?php } // Show if not last page ?></td>
                    </tr>
                </table>

        <?php include "footer.php"?>


<?php
	if($total_student_rows != 0){
		mysqli_free_result($student_query);
	}
?>
