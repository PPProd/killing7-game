<?php 	session_start();
		include('../db.php');
		include('../ugro.php');
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<head>

	<?php
	
	if(isset($_SESSION['id'])){
				ugras("index.php", 0);
			}
			
		if(isset($_POST['signin'])){
			
			/*PDO*/
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
			$link = new PDO("mysql:host=".host.";dbname=".database, username, password, $options);
			
			$stmt = $link->prepare("SELECT id, user, name, auth, pwd, del, description, location FROM usr WHERE user=?");
			$stmt->execute([$_POST['usr']]);
			$result = $stmt->fetchAll();
			if(count($result) == 1){
				//print "Felhasználó: ".$result[0]['id'];
				if($result[0]['del'] == 0){
					if (password_verify($_POST['pwd'], $result[0]['pwd'])) {
						$msg = 'Sikeres belépés';
						$_SESSION['id'] = $result[0]['id'];
						$_SESSION['user'] = $result[0]['user'];
						$_SESSION['name'] = $result[0]['name'];
						$_SESSION['auth'] = $result[0]['auth'];
						$_SESSION['location'] = $result[0]['location'];
						$_SESSION['description'] = $result[0]['description'];
						ugras('../index.php', 500);
					} else {
						$msg = 'Hibás jelszó';
					}
				}else{
					$msg = 'Ez a felhasználó ideiglenesen fel lett függesztve';
				}
			}else{
				$msg = "Nincs ilyen felhasználó az adatbázisban";
			}
			/*END PDO*/
		}
	?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Killing7</title>
    <meta name="description" content="Killing7 - Game">
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
                            <input type="text" name="usr" class="form-control" placeholder="Felhasználó név" required>
                        </div>
                        <div class="form-group">
                            <label>Jelszó</label>
                            <input type="password" name="pwd" class="form-control" placeholder="Jelszó" required>
                        </div>
                        <div class="checkbox">
                            
                        </div>
                        <button type="submit" name="signin" class="btn btn-success btn-flat m-b-30 m-t-30">Belépés</button>
                        <div class="social-login-content">
                            
                        </div>
                        <div class="register-link m-t-15 text-center">
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>


</body>
</html>
