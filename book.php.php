<?php
include('header.php');
?>

		<!-- end:header-top -->
	
		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Available Trips</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<form class="form-inline">
				  
				  <div class="form-group mx-sm-3 mb-2">
					<label for="inputPassword2" class="sr-only">Start Location</label>
					<input type="text" class="form-control" id="inputPassword2" placeholder="Start Location">
				  </div>
				  
				  <div class="form-group mx-sm-3 mb-2">
					<label for="inputPassword2" class="sr-only">End Location</label>
					<input type="text" class="form-control" id="inputPassword2" placeholder="End Location">
				  </div>
				  
				  <div class="form-group mx-sm-3 mb-2">
					<label for="inputPassword2" class="sr-only">Date</label>
					<input type="date" class="form-control" id="inputPassword2" placeholder="Date">
				  </div>
				  <button type="submit" class="btn btn-primary mb-2">Search</button>
				</form>
				<br><br><br>
				<div class="row">
					
					<?php
					include("connection.php");
					$sel = "select * from trip_tbl";
					$res = mysqli_query($con, $sel);
					while ($row = mysqli_fetch_array($res)) {
					?>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								
								<h3><?php echo $row['destination']; ?></h3>
								<span><?php echo $row['start']; ?> - <?php echo $row['destination']; ?></span>
								<span class="price">₹<?php echo $row['fare']; ?></span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<?php
					}
					?>
					
				</div>
			</div>
		</div>


	<?php
	include('footer.php');
	?>
