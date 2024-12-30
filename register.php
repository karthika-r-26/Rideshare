<?php
include('header.php');
?>

<!-- end:header-top -->

		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>User Registration</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				
					<div class="row animate-box">
						
						<div class="col-md-12">
							<div class="row">
							<form method="POST" enctype="multipart/form-data">
								<div class="control-group">
									<input type="text" class="form-control p-4" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="email" class="form-control p-4" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="text" class="form-control p-4" name="phone" placeholder="Phone" required="required" data-validation-required-message="Please enter a subject" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="password" class="form-control p-4" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="Password" required="required" data-validation-required-message="Please enter a subject" />
									<p class="help-block text-danger"></p>
								</div>
								<div class="control-group">
									<input type="file" class="form-control p-4"  name="uploadedfile" placeholder="Password" required="required" data-validation-required-message="Please enter a subject" />
									<p class="help-block text-danger"></p>
								</div>
								<div>
									<input class="btn btn-primary py-3 px-5" type="submit" name="submit" value="Register">
								</div>
							</form> <br>
						<center>Already have an account? <a href="login.php">Login Now</a></center>
							</div>
						</div>
					</div>
				
			</div>
		</div>
	<?php
	  include("connection.php");
	  if(isset($_POST['submit']))
	  {
		  $name=$_POST['name'];
		  $email=$_POST['email'];
		  $phone=$_POST['phone'];
		  $password=$_POST['password'];
		  
		  $target_path = "documents/";
		  
		  $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
		  
		  if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			  
			  $img=basename( $_FILES['uploadedfile']['name']);
			  
				$ins="insert into user(name,email,phone,password,document) values('$name','$email','$phone','$password','$img')";
				  //echo $ins;
				  $res=mysqli_query($con,$ins);
				  echo '<script>alert("Succesfully Registered!")
					  window.location="login.php";
					  </script>';
					  
			} else{
				echo '<script>alert("Registration failed!")
					  window.location="register.php";
					  </script>';
			}

		  
		  
		  
	  }
	  ?>

<?php
	include('footer.php');
	?>

