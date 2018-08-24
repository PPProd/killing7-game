<?php
include_once("../db.php");
define("item", $_POST['item']);
define("to", $_POST['to']);

	$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
	$sql = "UPDATE items SET at=".to." WHERE id=".item;
	$result = $link->query($sql);


?>