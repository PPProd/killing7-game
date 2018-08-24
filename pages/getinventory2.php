<?php
include_once("../db.php");

if (isset($_POST['player']) && !empty($_POST['player'])) {
	$variable = '
		
		<table id="table" class="table table-striped table-bordered col-12">
		<thead>
		  <tr>
			<th>Név</th>
			<th>Leírás</th>
			<th>Súly</th>
			<th>Áthelyez</th>
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
			<td><button type="button" class="btn btn-primary" onclick="my_moveInventory('.$row['id'].', '.$_POST['other'].');">Lerak/Felvesz</button></td>
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
				<th>Áthelyez</th>
			  </tr>
			</thead>
			<tbody>';
	$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password);
	$sql = "SELECT id, name, description, at, weight FROM items WHERE at=" . $_GET['player'];
	$result = $link->query($sql);
	foreach($result as $row) {
		$variable = $variable . '
		<tr>
			<td>' . $row['name'] . '</td>
			<td>' . $row['description'] . '</td>
			<td>' . $row['weight'] . '</td>
			<td><button type="button" class="btn btn-primary" onclick="my_moveInventory('.$row['id'].', '.$_POST['other'].');">Lerak/Felvesz</button></td>
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
