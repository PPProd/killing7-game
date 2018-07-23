<?php
include ("../db.php");

if (isset($_POST['player']) && !empty($_POST['player'])) {
	$variable = '
		
		<table id="table" class="table table-striped table-bordered">
		<thead>
		  <tr>
			<th>Név</th>
			<th>Leírás</th>
			<th>Súly</th>
		  </tr>
		</thead>
		<tbody>';
	$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password);
	$sql = "SELECT id, name, description, at, weight FROM items WHERE at=" . $_POST['player'];
	$result = $link->query($sql);
	foreach($result as $row) {
		$variable = $variable . '
		<tr>
			<td>' . $row['name'] . '</td>
			<td>' . $row['description'] . '</td>
			<td>' . $row['weight'] . '</td>
		</tr>
		
		';
	}

	$variable = $variable . '
		</tbody>
		</table>
		
		';
	echo json_encode(array(
		"content" => $variable
	));
}
else {
	$variable = '
		<table id="table" class="table table-striped table-bordered">
			<thead>
			  <tr>
				<th>Név</th>
				<th>Leírás</th>
				<th>Súly</th>
			  </tr>
			</thead>
			<tbody>';
	$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ));
	$sql = "SELECT id, name, description, at, weight FROM items WHERE at=" . $_GET['player'];
	$result = $link->query($sql);
	foreach($result as $row) {
		$variable = $variable . '
		<tr>
			<td>' . $row['name'] . '</td>
			<td>' . $row['description'] . '</td>
			<td>' . $row['weight'] . '</td>
		</tr>
		';
	}

	$variable = $variable . '
		</tbody>
		</table>
		';
	echo $variable;
	echo "<br>json: ".json_encode(array(
		"content" => $variable
	));
}

?>
