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
                <h3>Search Rides</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            <br><br><br>

            <div class="col-sm-8 col-sm-offset-2">
                <div class="tabulation animate-box">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Trips</a>
                        </li>
                        <li role="presentation">
                            <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Rideshare</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="flights">
                            <form method="POST" action="travel_booking.php">
							<div class="row">
                                <div class="col-sm-12 mt">
                                    <div class="input-field">
                                        <label for="from">Start Point:</label>
                                        <select class="form-control" name="start1">
											<option>From</option>
											<?php
											$sel=mysqli_query($con,"SELECT DISTINCT `start` FROM trip_tbl");
											while($row=mysqli_fetch_array($sel))
											{
											?>
											<option><?php echo $row['start']; ?></option>
											<?php
											}
											?>
										</select>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt">
                                    <div class="input-field">
                                        <label for="from">End Point:</label>
                                        <select class="form-control" name="destination1">
											<option>From</option>
											<?php
											$sel=mysqli_query($con,"SELECT DISTINCT `destination` FROM trip_tbl");
											while($row=mysqli_fetch_array($sel))
											{
											?>
											<option><?php echo $row['destination']; ?></option>
											<?php
											}
											?>
										</select>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt">
                                    <div class="input-field">
                                        <label for="date-start">Date:</label>
                                        <input type="text" class="form-control" id="date-start" name="date" placeholder="mm/dd/yyyy"/>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <input type="submit" name="submit1" class="btn btn-primary btn-block" value="Search">
                                </div>
                            </div>
							</form>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="hotels">
							<div class="row">
								<div class="col-sm-10">
									<form method="POST" action="rideshare.php">
									<div class="row">
										<div class="col-sm-12 mt">
											<div class="input-field">
												<label for="from">Start Point:</label>
												<select class="form-control" name="start">
													<option>From</option>
													<?php
													$sel=mysqli_query($con,"SELECT DISTINCT `start` FROM trip_tbl");
													while($row=mysqli_fetch_array($sel))
													{
													?>
													<option><?php echo $row['start']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-sm-12 mt">
											<div class="input-field">
												<label for="from">End Point:</label>
												<select class="form-control" name="destination">
													<option>From</option>
													<?php
													$sel=mysqli_query($con,"SELECT DISTINCT `destination` FROM trip_tbl");
													while($row=mysqli_fetch_array($sel))
													{
													?>
													<option><?php echo $row['destination']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-sm-12 mt">
											<div class="input-field">
												<label for="date-start">Date:</label>
												<input type="text" class="form-control" id="date-start" name="date" placeholder="mm/dd/yyyy"/>
											</div>
										</div>

										<div class="col-xs-12">
											<input type="submit" class="btn btn-primary btn-block" name="submit" value="Search">
										</div>
									</div>
									</form>
								</div>

								<!-- Vertical Icons -->
								<div class="col-sm-2">
									<ul class="vertical-icons">
										<a href="add_trip.php"><i class="fa-solid fa-circle-plus" style="font-size:30px;"></i></a>
										<a href=""><i class="fa-regular fa-messages"></i></a>
									</ul>
								</div>
							</div>
						</div>

                    </div>

                </div>
            </div>

            

        </div>

    </div>
</div>




	<?php
	include('footer.php');
	?>
