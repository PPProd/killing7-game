        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Játékosok</strong>
                        </div>
                        <div id="ajaxhere" class="card-body">
							<?php

								if (false) {
									
								}
								else {
									$variable = '
										<table id="table" class="table table-striped table-bordered">
											<thead>
											  <tr>
												<th>ID</th>
												<th>User</th>
												<th>Név</th>
												<th>Leírás</th>
												<th>Halott?</th>
											  </tr>
											</thead>
											<tbody>';
									$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password);
									$sql = "SELECT id, user, name, location, description, del FROM usr WHERE location=0 ORDER BY del ASC";
									$result = $link->query($sql);
									foreach($result as $row) {
										$variable = $variable . '
										<tr>
											<td>' . $row['id'] . '</td>
											<td>' . $row['user'] . '</td>
											<td>' . $row['name'] . '</td>
											<td>' . $row['description'] . '</td>
											<td>';
											if($row['del']=="1"){
												$variable = $variable .'Igen';
											}else{
												$variable = $variable .'Nem';
											}
											$variable = $variable .'</td>
										</tr>
										';
									}

									$variable = $variable . '
										</tbody>
										</table>
										';
									echo $variable;
								}

								?>

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