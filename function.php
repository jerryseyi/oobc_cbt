<?php

if (!function_exists("GetSQLValueString")) {
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
		global $local;

		$theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($local, $theValue) : mysqli_escape_string($theValue);

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

function dd($data){
	echo "<pre>" . var_dump($data) . "</pre>";
	die();
}

function usersCount($connection) {
    $sql = "SELECT COUNT(id) FROM users";
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_fetch_row($result);

    return $rows[0];
}

function tutorsCount($connection) {
    $sql = "SELECT COUNT(id) FROM users WHERE role = 1";
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_fetch_row($result);

    return $rows[0];
}

function examsCount($connection) {
    $sql = "SELECT COUNT(exam_id) FROM exam";
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_fetch_row($result);

    return $rows[0];
}

function studentsCount($connection) {
    $sql = "SELECT COUNT(id) FROM users WHERE role = 0";
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_fetch_row($result);

    return $rows[0];
}