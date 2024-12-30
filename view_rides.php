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
                <h3>View Rides</h3>
            </div>
            <br><br><br>

            <div class="col-sm-12 ">
			<table class="table table-bordered">
				<tr>
					<th style="text-align: center;">#</th>
					<th style="text-align: center;">Start point</th>
					<th style="text-align: center;">End point</th>
					<th style="text-align: center;">Vehicle</th>
					<th style="text-align: center;">Vehicle No</th>
					<th style="text-align: center;">Seats</th>
					<th style="text-align: center;">Price</th>
					<th style="text-align: center;">Date</th>
					<th style="text-align: center;">Time</th>
				</tr>

				<?php 
				$sel="select * from trip_tbl where user_id='$_SESSION[uid]'";
				$res=mysqli_query($con,$sel);
				$rows=mysqli_num_rows($res);
				if($rows>0)
				{
					$i=1;
				while($row=mysqli_fetch_array($res))
				{
					$sql=mysqli_query($con,"select * from trip_tbl where id='$row[trip_id]'");
					$cc=mysqli_fetch_array($sql);
					
					$sql1=mysqli_query($con,"select * from user where id='$cc[user_id]'");
					$cc1=mysqli_fetch_array($sql1);
					
				?>
				
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['start']; ?></td>
					<td><?php echo $row['destination']; ?></td>
					<td><?php echo $row['vehicle']; ?></td>
					<td><?php echo $row['vehicle_no']; ?></td>
					<td><?php echo $row['seats']; ?></td>
					<td><?php echo $row['fare']; ?></td>
					<td><?php echo $row['date']; ?></td>
					<td><?php echo $row['time']; ?></td>
					<td>
						<?php
						if($row['status']=='pending')
						{
							$amount=$row['seats']*$row['price'];
							echo "<a href='payment.php?id=$row[id]&amt=$amount'>payment</a>";
						}
						?>
					</td>
				</tr>
				
				<?php
				$i++;
				}
				}
				else{
					echo "<tr><td colspan='6'>No data found for Air travel type.</td></tr>";
				}
				?>
				
				
			</table>
			
			
			
			
			
            </div>
			
			
			
			
			
			
        </div>

    </div>
</div>




	<?php
	include('footer.php');
	?>