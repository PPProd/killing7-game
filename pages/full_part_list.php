        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Összes készáru az adatbázisban</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Kép</th>
                        <th>ID</th>
                        <th>Szám</th>
                        <th>Név</th>
                        <th>Figyelmeztetés</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
						$link = new PDO("mysql:host=".host.";dbname=".database, username, password);
						$sql = "SELECT id, num, ita, eng, min, img FROM parts";
						$result = $link->query($sql);
						foreach($result as $row){
							print '
							
							<tr>
								<td>';
								if($row['img']!=""){
									print '<img src="'.$row['img'].'">'; //ezzel még kell foglalkozni sokat
								}
								print '</td>
								<td>'.$row['id'].'</td>
								<td>'.$row['num'].'</td>
								<td>'.$row['ita'].'<br>'.$row['eng'].'</td>
								<td>'.$row['min'].'</td>
							</tr>
							
							';
						}
					?>
                    </tbody>
                  </table>
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
		
	<script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
	
	<script>
		$('#example').DataTable( {
			language: {
			   "sEmptyTable":     "Nincs rendelkezésre álló adat",
			   "sInfo":           "Találatok: _START_ - _END_ Összesen: _TOTAL_",
			   "sInfoEmpty":      "Nulla találat",
			   "sInfoFiltered":   "(_MAX_ összes rekord közül szűrve)",
			   "sInfoPostFix":    "",
			   "sInfoThousands":  " ",
			   "sLengthMenu":     "_MENU_ találat oldalanként",
			   "sLoadingRecords": "Betöltés...",
			   "sProcessing":     "Feldolgozás...",
			   "sSearch":         "Keresés:",
			   "sZeroRecords":    "Nincs a keresésnek megfelelő találat",
			   "oPaginate": {
				   "sFirst":    "Első",
				   "sPrevious": "Előző",
				   "sNext":     "Következő",
				   "sLast":     "Utolsó"
			   },
			   "oAria": {
				   "sSortAscending":  ": aktiválja a növekvő rendezéshez",
				   "sSortDescending": ": aktiválja a csökkenő rendezéshez"
			   }
			}
		} );
	</script>