<?php
if(!isset($_SESSION['id']) || !isset($_GET['loc'])){
	ugras("../",0);
}else{
	define("me",$_SESSION['id']);
	define("loc",$_GET['loc']);
}
$link = new PDO("mysql:host=" . host . ";dbname=" . database, username, password);
$sql = "SELECT id, name, description FROM usr WHERE location=1 AND id=" . loc;
$result = $link->query($sql);
foreach($result as $row) {
	$name=$row['name'];
	$description=$row['description'];
}
?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                
				<div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Leírás</strong>
                        </div>
                        <div class="card-body row">
							<?php print $description; ?>
                        </div>
                    </div>
                </div>


                </div>
				
				<div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><?php print $name; ?>: Itt található eszközök</strong>
                        </div>
                        <div class="card-body row">
							<div class="col-0">
							</div>
							<div class="col-11 col-lg-4">
								Nálad:
								<div id="ajaxhere"></div>
							</div>
							<div class="col-2">
							</div>
							<div class="col-11 col-lg-4">
								Ezen a helyen:
								<div id="ajaxhere2"></div>
							</div>
							<div class="col-0">
							</div>
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
					url: "pages/getinventory2.php",
					data: {player: "'.$_SESSION['id'].'", other: "0"},
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
			}, 800); 
			
		});
	</script>
	<script>
		$(document).ready(function(){
			setInterval(function() {
				//console.log("ready - ID='.loc.'");
				$.ajax({
					type: "POST",
					url: "pages/getinventory2.php",
					data: {player: "'.loc.'", other: "1"},
					dataType:\'JSON\', 
					success: function(response){
						//console.log("response: "+response.content);
						$("#ajaxhere2").html(response.content)
					},
					error: function(xhr, textStatus, error){
						console.log(xhr.statusText);
						console.log(textStatus);
						console.log(error);
					}
				});
			}, 800); 
			
		});
	</script>
	
	<script>
	function my_moveInventory(item, other){
		var xhttp = new XMLHttpRequest();
		if(other!=1){
			xhttp.open("POST", "pages/move.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("item="+item+"&to='.loc.'");
		}else{
			xhttp.open("POST", "pages/move.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("item="+item+"&to='.$_SESSION['id'].'");
		}
		
	}
	</script>
	
	'; ?>