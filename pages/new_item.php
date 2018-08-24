	<?php
		if($_SESSION['id'] != 2){
			ugras("index.php",0);
		}
		
		if(isset($_POST['signin'])){
			/*PDO*/
			$link = new PDO("mysql:host=".host.";dbname=".database, username, password);
			$stmt = $link->prepare("INSERT INTO items (name, description, at, weight) VALUES (:name, :description, :at, :weight)");
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':description', $description);
			$stmt->bindParam(':at', $at);
			$stmt->bindParam(':weight', $weight);

			// insert one row
			$options = [
				'cost' => 9,
			];
			$name = $_POST['name'];
			$description = $_POST['description'];
			$at=$_POST['at'];
			$weight=$_POST['weight'];
			$stmt->execute();
			print $name.' Felvéve';
			/*END PDO*/
		}
	?>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <form method="post">
						<div class="form-group">
						<?php
								if(isset($msg) && $msg!=''){
									print $msg.'<br>';
								}
							?>
                            <label>Név</label>
                            <input type="text" name="name" class="form-control" placeholder="" required>
                        </div>
						<div class="form-group">
                            <label>Leírás</label>
                            <input type="text" name="description" class="form-control" placeholder="" required>
                        </div>
						<div class="form-group">
                            <label>Itt:</label>
                            <select class="form-control" name="at">
								<?php
									$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password);
										$sql = "SELECT id, name FROM usr WHERE id<>2";
										$result = $link->query($sql);
										foreach($result as $row) {
											print '<option value='.$row['id'].'>'.$row['name'].'</option>';
										}
								?>
							</select>
                        </div>
						<div class="form-group">
                            <label>Súly(Kg)</label>
                            <input type="number" step="0.01" min="0" name="weight" class="form-control" placeholder="" required>
                        </div>
                        <button type="submit" name="signin" class="btn btn-success btn-flat m-b-30 m-t-30">Felvesz</button>
                        <div class="social-login-content">
                            
                        </div>
                        <div class="register-link m-t-15 text-center">
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>


</body>
