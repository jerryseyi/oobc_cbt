<?php 
// $config = array(
// 	'host'		=> 'localhost',
// 	'username' 	=> 'id17437081_oobcuser',
// 	'password' 	=> 'jDjgi[4Xjz>F[-(!',
// 	'dbname' 	=> 'id17437081_cbt'
// );

$config = array(
	'host'		=> 'localhost',
	'username' 	=> 'root',
	'password' 	=> 'K20/@don.com',
	'dbname' 	=> 'overcomer'
);

$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);