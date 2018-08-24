        <?php
			if(isset($_POST['used'])){
				foreach($_POST['used'] as $u){
					$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password, array(
						PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
						PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
					));
					$sql = "UPDATE items SET at=0 WHERE id=".$u;
					$result = $link->query($sql);
				}
				
				$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password, array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
				));
				$sql = "INSERT INTO `log` (`who`, `description`) VALUES ('".$_SESSION['id']."', 'MEGÖLTE ".$_POST['victim']."-et: ".$_POST['method']."'); INSERT INTO `noty` (`who`, `description`) VALUES ('".$_SESSION['id']."', 'MEGÖLTE ".$_POST['victim']."-et: ".$_POST['method']."');";
				$result = $link->query($sql);	
			}
		?>
		
		<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Gyilkosság</strong>
                        </div>
						<div class="card-body">
						<form method="post">
						<div class="row">
						<div class="col-md-1">
						</div>
                        <div class="form-group" class="col-md-3">
                            <label>Áldozat:</label>
                            <select class="form-control" name="victim">
								<?php
									$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password, array(
										PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
										PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
									  ));
										$sql = "SELECT id, name FROM usr WHERE id<>2 AND location=0";
										$result = $link->query($sql);
										foreach($result as $row) {
											print '<option value='.$row['id'].'>'.$row['name'].'</option>';
										}
								?>
							</select>
                        </div>
						<div class="col-md-3">
						</div>
						<div class="form-group" class="col-md-3">
                            <label>Felhasználva:</label>
                             <select name="used[]" data-placeholder="Válaszd ki a felhasznált eszközöket" multiple="multiple" class="standardSelect">
                                    <option value=""></option>
                                    <?php
										$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password, array(
											PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
											PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
										  ));
											$sql = "SELECT id, name FROM items WHERE at=" . $_SESSION['id'];
											$result = $link->query($sql);
											foreach($result as $row) {
												print '<option value='.$row['id'].'>'.$row['name'].'</option>';
											}
									?>
                                </select>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-1">
						</div>
						<div class="col-md-3">
						<label>Módszer:</label>
						<textarea rows="4" cols="50" name="method" class="form-control"></textarea>
						</div>
						<div class="col-md-3">
						<input type="submit" class="btn btn-primary btn-lg btn-block" value="OK">
						</div>
						</div>
						</form>
						</div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
		
	<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
	<script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>