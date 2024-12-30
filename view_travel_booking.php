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
                <h3>Travels Bookings</h3>
            </div>
            <br><br><br>

            <div class="col-sm-12 ">
			<table class="table table-bordered">
				<tr>
					<th style="text-align: center;">#</th>
					<th style="text-align: center;">Travels</th>
					<th style="text-align: center;">Amount</th>
					<th style="text-align: center;">Booking Date</th>
					<th style="text-align: center;">Status</th>
				</tr>

				<?php 
				$sel="select * from request_tbl where user_id='$_SESSION[uid]'";
				$res=mysqli_query($con,$sel);
				$rows=mysqli_num_rows($res);
				if($rows>0)
				{
					$i=1;
				while($row=mysqli_fetch_array($res))
				{
					$sql=mysqli_query($con,"select * from travels where id='$row[travel_id]'");
					$cc=mysqli_fetch_array($sql);
					
				?>
				
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $cc['name']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><?php echo $row['date']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td>
						<?php
						if($row['status']=='accepted')
						{
							$amount=$row['price'];
							echo "<a href='payment.php?id=$row[id]&amt=$amount&tt=travel'>payment</a>";
						}
						?>
					</td>
				</tr>
				
				<?php
				$i++;
				}
				}
				else{
					echo "<tr><td colspan='6'>No data found.</td></tr>";
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
