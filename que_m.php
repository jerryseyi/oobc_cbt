<?php
	require_once('Connections/local.php');
	require_once('function.php');
	require('core/init.php');

  	$currentPage = $_SERVER["PHP_SELF"];

  	$maxRows_rec = 20;
	$pageNum_rec = 0;

	if (isset($_GET['pageNum_rec'])) {
		$pageNum_rec = $_GET['pageNum_rec'];
	}

	$startRow_rec = $pageNum_rec * $maxRows_rec;

	$colname_rec = "-1";
	if (isset($_GET['exam_id'])) {
		$colname_rec = $_GET['exam_id'];
	}

	$query_rec = sprintf("SELECT * FROM question WHERE exam_id = %s ORDER BY que_id DESC", GetSQLValueString($colname_rec, "int"));
	$query_limit_rec = sprintf("%s LIMIT %d, %d", $query_rec, $startRow_rec, $maxRows_rec);
	
	$rec = mysqli_query($local, $query_limit_rec) or die(mysql_error($local));
	$row_rec = mysqli_fetch_assoc($rec);

	if (isset($_GET['totalRows_rec'])) {
	$totalRows_rec = $_GET['totalRows_rec'];
	} else {
	$all_rec = mysqli_query($local, $query_rec);
	$totalRows_rec = mysqli_num_rows($all_rec);
	}
	$totalPages_rec = ceil($totalRows_rec/$maxRows_rec)-1;

	$queryString_rec = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
	$params = explode("&", $_SERVER['QUERY_STRING']);
	$newParams = array();
	foreach ($params as $param) {
		if (stristr($param, "pageNum_rec") == false && 
			stristr($param, "totalRows_rec") == false) {
		array_push($newParams, $param);
		}
	}
	if (count($newParams) != 0) {
		$queryString_rec = "&" . htmlentities(implode("&", $newParams));
	}
	}
	$queryString_rec = sprintf("&totalRows_rec=%d%s", $totalRows_rec, $queryString_rec);

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
?>
<?php
$title = "Manage Question";
require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Available Questions</h2>
            <a href="add_que.php?exam_id=<?php echo $colname_rec ?>" class="btn">Add New Questions</a>
        </div>
        <?php $i=1; ?>
        <table>
            <thead>
            <tr>
                <td>S/N</td>
                <td>Question</td>
                <td>OPT_A</td>
                <td>OPT_B</td>
                <td>OPT_C</td>
                <td>OPT_D</td>
                <td>Answer</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
              <?php do { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row_rec['question']; ?></td>
                  <td><?php echo $row_rec['opt_A']; ?></td>
                  <td><?php echo $row_rec['opt_B']; ?></td>
                  <td><?php echo $row_rec['opt_C']; ?></td>
                  <td><?php echo $row_rec['opt_D']; ?></td>
                  <td><?php echo $row_rec['ans']; ?></td>
                  <td> <a href="edit_que.php?que_id=<?php echo $row_rec['que_id']; ?>&exam_id=<?php echo $colname_rec?>" class="status delivered">Edit</a>
                     <a href="del_que.php?que_id=<?php echo $row_rec['que_id']; ?>&exam_id=<?php echo $colname_rec?>" class="status return" onClick="return confirm('Are u sure you want to delete this question? ')">Delete</a></td>
                </tr>
                <?php $i= $i+1; } while ($row_rec = mysqli_fetch_assoc($rec)); ?>
            </tbody>
        </table>

        Records <?php echo ($startRow_rec + 1) ?> to <?php echo min($startRow_rec + $maxRows_rec, $totalRows_rec) ?> of <?php echo $totalRows_rec ?>
        <table border="0">
          <tr>
            <td><?php if ($pageNum_rec > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_rec=%d%s", $currentPage, 0, $queryString_rec); ?>">First</a>
                <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_rec > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_rec=%d%s", $currentPage, max(0, $pageNum_rec - 1), $queryString_rec); ?>">Previous</a>
                <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_rec < $totalPages_rec) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_rec=%d%s", $currentPage, min($totalPages_rec, $pageNum_rec + 1), $queryString_rec); ?>">Next</a>
                <?php } // Show if not last page ?></td>
            <td><?php if ($pageNum_rec < $totalPages_rec) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_rec=%d%s", $currentPage, $totalPages_rec, $queryString_rec); ?>">Last</a>
                <?php } // Show if not last page ?></td>
          </tr>
        </table>

        <?php include "footer.php";?>
<?php
mysqli_free_result($rec);
?>
