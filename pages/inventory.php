        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><?php print $_SESSION['name']; ?> Eszköztára</strong>
                        </div>
                        <div id="ajaxhere" class="card-body">
							
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
	<?php print '<script>
		$(document).ready(function(){
			setInterval(function() {
				//console.log("ready - ID='.$_SESSION['id'].'");
				$.ajax({
					type: "POST",
					url: "pages/getinventory.php",
					data: {player: "'.$_SESSION['id'].'"},
					dataType:\'JSON\', 
					success: function(response){
						//console.log("response: "+response.content);
						$("#ajaxhere").html(response.content)
					},
					error: function(xhr, textStatus, error){
						console.log(xhr.statusText);
						console.log(textStatus);
						console.log(error);
					}
				});
			}, 1000); 
			
		});
	</script>'; ?>