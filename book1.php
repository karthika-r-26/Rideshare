<?php
include('header.php');

include("connection.php");
$sel = "select * from trip_tbl where id='$_REQUEST[id]'";
$res = mysqli_query($con, $sel);
$row = mysqli_fetch_array($res); 
?>

		<!-- end:header-top -->
	
		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Book Trips</h3>
					</div>
				</div>
				<form class="form-area contact-form text-right"   method="post">
					<div class="row">
						<div class="col-lg-6 form-group">
							<label style="float: left;">No of seats</label>
							<input name="seats" placeholder="Enter no of seats" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="number" max="<?php echo $row['seats'] ?>">
						</div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left;"></div>
							<button class="genric-btn primary" style="float: left;" name="submit">Submit</button>	<br><br><br>
						
						</div>
					</div>
				</form>	
				<br><br><br>
				<div class="row">
					
			<?php
			  include("connection.php");
			  if(isset($_POST['submit']))
			  {
				  $seat=$_POST['seats'];
				  $date=date('Y-m-d H:i:s');
				  $uid=$_SESSION['uid'];
				  $amt=$row['fare'];
				  
				  //$_SESSION['useremail']=$email;
				  
				  $ins="INSERT INTO `booking`(`user_id`, `trip_id`,`seats`, `date`, `status`,price) values('$uid','$_REQUEST[id]','$seat','$date','pending','$amt')";
				  echo $ins;
				  $res=mysqli_query($con,$ins);
				  if($res)
				  {
					  
				  echo '<script>
						alert("Seats booked!")
					  window.location="view_booking.php";
					  </script>';
				  }
				  
			  }
			 ?>
					
				</div>
			</div>
		</div>


	<?php
	include('footer.php');
	?>
