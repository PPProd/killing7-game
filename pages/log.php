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
												<th>Mikor</th>
												<th>Ki</th>
												<th>Mit</th>
											  </tr>
											</thead>
											<tbody>';
									$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password);
									$sql = 'SELECT log.id AS "id", log.time AS "time", usr.name AS "who", log.description AS "description" FROM log, usr WHERE log.who=usr.id ORDER BY log.time DESC';
									$result = $link->query($sql);
									foreach($result as $row) {
										$time=explode(" ",$row['time']);
										$variable = $variable . '
										<tr>
											<td>' . $time[1] . '</td>
											<td>' . $row['who'] . '</td>
											<td>' . $row['description'].'</td>
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