<?php session_start(); ?>
<!doctype html>
<head>
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<?php

include_once('db.php');
include_once('ugro.php');
if(isset($_SESSION['id'])){
				}else{
					ob_start(); // ensures anything dumped out will be caught

					// do stuff here
					$url = 'pages/login.php'; // this can be set based on whatever

					// clear out the output buffer
					while (ob_get_status()) 
					{
						ob_end_clean();
					}

					// no redirect
					ugras($url,0);
				}
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Killing7</title>
    <meta name="description" content="Killing7 Játék - Készítette: Dombi Tibor">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
	

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><!--img src="images/logo.png" alt="Logo"--> <?php print $_SESSION['user'] ?></a>
                <a class="navbar-brand hidden" href="./"><!--img src="images/logo2.png" alt="Logo"-->K7</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i> Kezdőlap </a>
                    </li>
					
					<h3 class="menu-title">Játékos menü</h3><!-- /.menu-title -->
					<li><a href="index.php?p=mychar"><i class="menu-icon fa fa-user"></i> Saját karakter</a></li>
                    <li><a href="index.php?p=inventory"><i class="menu-icon fa fa-key"></i> Eszköztár </a></li>
					<li><a href="index.php?p=kill"><i class="menu-icon fa fa-bullseye"></i> Gyilkosság</a></li>
					<li><a href="index.php?p=manual"><i class="menu-icon fa fa-bars"></i> Játék leírás </a></li>
					<li><a href="index.php?p=map"><i class="menu-icon fa fa-map-marker"></i> Térkép </a></li>
					<li><a href="pages/logout.php"><i class="menu-icon fa fa-minus-square"></i> Kijelentkezés </a></li>
					
					<?php if($_SESSION['auth'] == 3){
						
						print '
						<h3 class="menu-title">Admin menü</h3><!-- /.menu-title -->
						<li><a href="index.php?p=players"><i class="menu-icon fa fa-table"></i> Játékosok </a></li>
						<li><a href="pages/new_usr.php"><i class="menu-icon fa fa-table"></i> Új játékos / helyszín </a></li>
						<li><a href="index.php?p=new_item"><i class="menu-icon fa fa-table"></i> Új tárgy </a></li>
						<li><a href="index.php?p=notification"><i class="menu-icon fa fa-table"></i> Értesítések </a></li>
						<li><a href="index.php?p=log"><i class="menu-icon fa fa-table"></i> Napló </a></li>';
						
					} ?>
					
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                  

                    

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- page content -->
		
		<?php
			if(isset($_GET["p"]) && $_GET["p"]!=""){
				$p = $_GET["p"];
				if(file_exists("pages/".$p.".php")){
					include_once ("pages/".$p.".php");
				}
				else{
					 ugras("404.html",1);
				}
			}
			else{
				if(isset($_SESSION['id'])){
					include_once("pages/home.php");
				}else{
					ob_start(); // ensures anything dumped out will be caught

					// do stuff here
					$url = 'pages/login.php'; // this can be set based on whatever

					// clear out the output buffer
					while (ob_get_status()) 
					{
						ob_end_clean();
					}

					// no redirect
					header( "Location: $url" );
				}
			}
		?>
		
        <!-- /page content -->
		
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    



</body>
</html>
