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
                <h3>Rideshares</h3>
            </div>
            <br><br><br>

            <div class="col-sm-12 ">
				<form class="form-area contact-form text-right"   method="post">
					<div class="row">	
						<div class="col-lg-6 form-group">
							<label style="float: left;">Amount</label>
							<input name="amount" placeholder="Enter amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text" value="<?php echo $_REQUEST['amt']?>">
						</div>
						<div class="col-lg-6 form-group">
							<label style="float: left;">Card Name</label>
							<input name="card" placeholder="Enter name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<label style="float: left;">Card Number</label>
							<input name="card_no" placeholder="Enter card number" pattern="[0-9]{16}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="number">
						</div>
						<div class="col-lg-6 form-group">
							<label style="float: left;">Card Type</label>
							<select name="card_type" class="common-input mb-20 form-control">
								<option value="debit">debit</option>
								<option value="credit">credit</option>
							</select>
						</div>
						<div class="col-lg-6 form-group">
							<label style="float: left;">Expiry</label>
							<input name="month" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="month">
						</div>
						<div class="col-lg-6 form-group">
							<label style="float: left;">Cvv</label>
							<input name="cvv" placeholder="Enter cvv" pattern="[0-9]{3}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="number">
						</div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left;"></div>
							<button class="genric-btn primary" style="float: left;" name="submit">Submit</button>	<br><br><br>
						
						</div>
					</div>
				</form>	
			
			<?php
			if(isset($_POST['submit']))
			{
				$amount=$_POST['amount'];
				$card=$_POST['card'];
				$card_no=$_POST['card_no'];
				$card_type=$_POST['card_type'];
				$month=$_POST['month'];
				$cvv=$_POST['cvv'];
				$date=date('Y-m-d H:i:s');
				
				$ins="INSERT INTO `payment`(`uid`, `booking_id`, `amount`, `cardname`, `cardnumber`, `card_type`, `expiry`, `cvv`, `date`, `status`,type) 
					values('$_SESSION[uid]','$_REQUEST[id]','$amount','$card','$card_no','$card_type','$month','$cvv','$date','completed','$_REQUEST[type]')";
					echo $ins;
				$res=mysqli_query($con,$ins);
				  if($res)
				  {
					  mysqli_query($con,"update request_tbl set status='completed' where id='$_REQUEST[id]'");
				  echo '<script>
						alert("Payment Completed!")
					  window.location="view_booking.php";
					  </script>';
				  }
				
			}				
			
			
			
			
			?>
			
			
            </div>
			
			
        </div>

    </div>
</div>




	<?php
	include('footer.php');
	?>
