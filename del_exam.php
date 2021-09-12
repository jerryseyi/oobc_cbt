<?php
  require_once('Connections/local.php');
  require_once('function.php');
  require('core/init.php');

  if ((isset($_GET['exam_id'])) && ($_GET['exam_id'] != "")) {
    $deleteSQL = sprintf("DELETE FROM exam WHERE exam_id=%s",
      GetSQLValueString($_GET['exam_id'], "int"));

    $Result1 = mysqli_query($local, $deleteSQL) or die(mysqli_error($local));

    $deleteGoTo = "manage.php?ms=1";

    if (isset($_SERVER['QUERY_STRING'])) {
      $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
      $deleteGoTo .= $_SERVER['QUERY_STRING'];
    }

    header(sprintf("Location: %s", $deleteGoTo));
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>