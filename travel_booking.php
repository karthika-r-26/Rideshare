<?php
include('header.php');
include('connection.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

		<!-- end:header-top -->
	
<div id="fh5co-tours" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3>Travel Booking</h3>
            </div>
            <br><br><br>

            <div class="col-sm-12 ">
			<div class="col-md-12 animate-box">
			<?php
			if(isset($_POST['submit1']))
			{
				$start=$_POST['start1'];
				$destination=$_POST['destination1'];
				$date=$_POST['date'];
				
				//echo "s".$start;
				//echo "d".$destination;
				//echo "d".$date;
				
				$datetime = DateTime::createFromFormat('m/d/Y', $date);
				$formatted_date = $datetime->format('Y-m-d');
				
				$sel="select * from travel_ride where start='$start' and destination='$destination' and date='$formatted_date' and seats!='0'";
				//echo $sel;
				$res=mysqli_query($con,$sel);
				$rows=mysqli_num_rows($res);
				if($rows>0)
				{
				while($row=mysqli_fetch_array($res))
				{
					$s=mysqli_query($con,"select * from travels where id='$row[user_id]'");
					$c=mysqli_fetch_array($s);
			?>
			<br><br>
			<a href="request.php?id=<?php echo $row['id'] ?>&amt=<?php echo $row['fare'] ?>" class="flight-book">
				<div class="plane-name">
					<span class="p-flight">Travels: <?php echo $c['name'] ?></span><br>
				</div>
				<div class="desc">
					<div class="left">
						<h4><?php echo $row['start'] ?>-<?php echo $row['destination'] ?></h4>
						<span><?php echo $row['date'] ?></span> ||
						<span><?php echo $row['time'] ?></span> ||
						<span>Avaliable seats: <?php echo $row['seats'] ?></span> 
					</div>
					<div class="right">
						<span class="price">
							₹<?php echo $row['fare'] ?>
							<button>Request</button>
						</span>
						
					</div>
					
					
				</div>
				
			</a>
			<br>
			
			<?php
				}
			
				}
			}
			
			
			?>
			
					
						
						
						
						<br><br><br>
						
					</div>
			
			
			
			
			
            </div>
			
			
			
			
			
			
        </div>

    </div>
</div>




	<?php
	include('footer.php');
	?>
