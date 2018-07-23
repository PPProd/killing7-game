<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<head>

	<?php
	session_start();
	include_once('../db.php');
	include_once('../ugro.php');
	if(isset($_SESSION['id'])){
				ugras("index.php",0);
			}
			
		if(isset($_POST['signin'])){
			
			
			
			
			/*PDO*/
			$link = new PDO("mysql:host=".host.";dbname=".database, username, password);
			$stmt = $link->prepare("INSERT INTO usr (user, name, pwd, location, description) VALUES (:usr, :name, :pwd, :location, :description)");
			$stmt->bindParam(':usr', $usr);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':pwd', $pwd);
			$stmt->bindParam(':location', $location);
			$stmt->bindParam(':description', $description);

			// insert one row
			$options = [
				'cost' => 9,
			];
			$usr = $_POST['usr'];
			$name = $_POST['name'];
			$pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT, $options);
			$description = $_POST['description'];
			if($_POST['location']){
				$location=1;
			}else{
				$location=0;
			}
			$stmt->execute();
			/*END PDO*/
		}
	?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Raktár admin</title>
    <meta name="description" content="Raktár admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">

    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="../index.php">
                        <img class="align-content" src="../images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
							<?php
								if(isset($msg) && $msg!=''){
									print $msg.'<br>';
								}
							?>
                            <label>Felhasználó név</label>
                            <input type="text" name="usr" class="form-control" placeholder="Felhasznalo.Nev" required>
                        </div>
                        <div class="form-group">
                            <label>Jelszó</label>
                            <input type="password" name="pwd" class="form-control" placeholder="Jelszó" required>
                        </div>
						<div class="form-group">
                            <label>Név</label>
                            <input type="text" name="name" class="form-control" placeholder="Példa János" required>
                        </div>
						<div class="form-group">
                            <label>Leírás</label>
                            <input type="text" name="description" class="form-control" placeholder="" required>
                        </div>
						
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="location"> Helyszín
                            </label>
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
</html>
