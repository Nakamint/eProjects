<?php
	require_once("./../classes/databasecnt.php.php");
	require_once("./../inc/function.php");

	$db = new Db();
	$mysqli = Db::$_mysqli;
	
	session_start();
?>