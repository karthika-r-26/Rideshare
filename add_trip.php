<?php
include('header.php');
?>

<!-- end:header-top -->

		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Add Trips</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				
					<div class="row animate-box">
						
						<div class="col-md-12">
							<div class="row">
							<form method="POST" enctype="multipart/form-data">
								<div class="control-group">
									<input type="text" class="form-control p-4" name="start" placeholder="Start Point" required="required" data-validation-required-message="Please enter the start point" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="text" class="form-control p-4" name="destination" placeholder="Destination" required="required" data-validation-required-message="Please enter the destination" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="number" class="form-control p-4" name="seats" placeholder="Number of Seats" required="required" data-validation-required-message="Please enter the number of seats" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="text" class="form-control p-4" name="vehicle" placeholder="Vehicle" required="required" data-validation-required-message="Please enter the vehicle" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="text" class="form-control p-4" name="vehicle_no" placeholder="Vehicle No" required="required" data-validation-required-message="Please enter the vehicle" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="number" class="form-control p-4" name="fare" placeholder="Fare" required="required" data-validation-required-message="Please enter the fare" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="date" class="form-control p-4" name="date" placeholder="Date" required="required" data-validation-required-message="Please enter the date" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="time" class="form-control p-4" name="time" placeholder="Time" required="required" data-validation-required-message="Please enter the time" />
									<p class="help-block text-danger"></p>
								</div>
								<div>
									<input class="btn btn-primary py-3 px-5" type="submit" name="submit" value="Submit">
								</div>
							</form>

							</div>
						</div>
					</div>
				
			</div>
		</div>
	<?php
	  include("connection.php");
	  if(isset($_POST['submit']))
	  {
		$start = $_POST['start'];
		$destination = $_POST['destination'];
		$seats = $_POST['seats'];
		$vehicle = $_POST['vehicle'];
		$vehicle_no = $_POST['vehicle_no'];
		$fare = $_POST['fare'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		  
		  $ins="INSERT INTO trip_tbl (user_id,start, destination, seats, vehicle, vehicle_no, fare, date, time) values('$_SESSION[uid]','$start', '$destination', '$seats', '$vehicle', '$vehicle_no', '$fare', '$date', '$time')";
		$res=mysqli_query($con,$ins);
		if($res)
		{
				echo '<script>alert("trip added!")
					  window.location="add_trip.php";
					  </script>';
		}
			

		  
		  
		  
	  }
	  ?>

<?php
	include('footer.php');
	?>

