<?php
// $hostname_local = "localhost";
// $database_local = "id17437081_cbt";
// $username_local = "id17437081_oobcuser";
// $password_local = "jDjgi[4Xjz>F[-(!";

$hostname_local = "localhost";
$database_local = "overcomer";
$username_local = "root";
$password_local = "";

$local = mysqli_connect($hostname_local, $username_local, $password_local, $database_local);

if (mysqli_connect_errno()) {
    echo "Failed to connect to Database: " . mysqli_connect_error();
    
    exit();
}
?>
