<?php
include('header.php');
?>


		<!-- end:header-top -->

		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Login to continue</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				
					<div class="row animate-box">
						
						<div class="col-md-12">
							<div class="row">
								<?php
						error_reporting(0);
						if($_REQUEST['st']=="fail")
						{
							echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							<center><b>Incorrect Username or Password!<b></center>
						</div>";
						}
						?>
                        <form method="POST" action="redirect.php">
                            <div class="control-group">
                                <input type="email" class="form-control p-4" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" class="form-control p-4" name="password"  placeholder="Password" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
							<div class="control-group">
                                    <select class="form-control p-4" name="type" style="height: 47px;">
                                        <option selected>Select Usertype</option>
                                        <option value="admin">Admin</option>
                                        <option value="travels">Travels</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            <div><br> 
                                <button class="btn btn-primary py-3 px-5" type="submit" name="login">Login</button>
                            </div>
                        </form><br> 	
						<center>Don't have an account? <a href="register.php">Register Now</a></center>
							</div>
						</div>
					</div>
				
			</div>
		</div>


<?php
	include('footer.php');
	?>

