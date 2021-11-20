<?php require_once('Connections/local.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_four = 10;
$pageNum_four = 0;
if (isset($_GET['pageNum_four'])) {
  $pageNum_four = $_GET['pageNum_four'];
}
$startRow_four = $pageNum_four * $maxRows_four;

$query_four = "SELECT * FROM `session` ORDER BY session_id DESC";
$query_limit_four = sprintf("%s LIMIT %d, %d", $query_four, $startRow_four, $maxRows_four);
$four = mysqli_query($local, $query_limit_four) or die(mysql_error());
$row_four = mysqli_fetch_assoc($four);

if (isset($_GET['totalRows_four'])) {
  $totalRows_four = $_GET['totalRows_four'];
} else {
  $all_four = mysqli_query($local, $query_four);
  $totalRows_four = mysqli_num_rows($all_four);
}
$totalPages_four = ceil($totalRows_four/$maxRows_four)-1;

$queryString_four = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_four") == false && 
        stristr($param, "totalRows_four") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_four = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_four = sprintf("&totalRows_four=%d%s", $totalRows_four, $queryString_four);
?>
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
?>

<?php
$title = "Session";
require_once("header.php");
?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Available Sessions</h2>
            <a href="add_sess.php" class="btn">Add New Session</a>
        </div>
                                        
        <?php if ($totalRows_four > 0) { // Show if recordset not empty ?>
        <table>
            <thead>
            <tr>
                <td>Academic Session</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            <?php do { ?>
                <tr>
                    <td><?php echo $row_four['session_name']; ?></td>
                    <td><a href="view_s.php?session_id=<?php echo $row_four['session_id']; ?>" class="status delivered">View records</a></td>
                </tr>
            <?php } while ($row_four = mysqli_fetch_assoc($four)); ?>
        </table>
      <table border="0">
      <tr>
        <td><?php if ($pageNum_four > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_four=%d%s", $currentPage, 0, $queryString_four); ?>">First</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_four > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_four=%d%s", $currentPage, max(0, $pageNum_four - 1), $queryString_four); ?>">Previous</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_four < $totalPages_four) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_four=%d%s", $currentPage, min($totalPages_four, $pageNum_four + 1), $queryString_four); ?>">Next</a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_four < $totalPages_four) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_four=%d%s", $currentPage, $totalPages_four, $queryString_four); ?>">Last</a>
            <?php } // Show if not last page ?></td>
      </tr>
    </table>
    Records <?php echo ($startRow_four + 1) ?> to <?php echo min($startRow_four + $maxRows_four, $totalRows_four) ?> of <?php echo $totalRows_four ?> </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_four == 0) { // Show if recordset empty ?>
        No record found
      <?php } // Show if recordset empty ?>
    <?php include "footer.php"?>
<?php
mysqli_free_result($four);
?>
