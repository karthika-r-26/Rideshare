<?php
error_reporting(0);
$status=$_REQUEST['status'];
if ($status == "logout")
{
    session_start();
    session_unset();
    session_destroy();
	header("location:../login/login.php");
}
?>
<?php
include("../common/menu.php");
	
?>


    <style>
#right
{
	
float:right;	
color:#333;
font-size:12px;
}
</style>

<style>
#right
{
	
float:right;	
color:#333;
font-size:12px;
}
.userd
{
color:#333;	
}
.red
{
background:#FFECF4;
padding:10px;	
}


#right
{
	
float:right;	
color:#333;
font-size:12px;
}
.userd
{
color:#333;	
}
.red
{
background:#F36;
padding:10px;	
}
.table
{
margin-bottom:10px;
background:#E6F4FF;	
}
.sep
{
height:30px;
background:#666;	
}
</style>
       


        <div class="content" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="opacity: 0.7;">
                            <div class="header">
                                                             
                            </div>
                            <div class="content all-icons">
                                <div class="row" style=" /*background-image: url(Bugs.jpg);*/ ">
                                           
                              <?php
							  if($_SESSION['user']=='admin')
							  {
							  ?>
                                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../passenger_tbl/select.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="USERS">
                                    </div></a>
                                  </div>
								  
								  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../travels/select.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="TRAVELS">
                                    </div></a>
                                  </div>



                                   <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../trip_tbl/select.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="TRIPS">
                                    </div></a>
                                  </div>
							 <?php
							  }
							  
							  if($_SESSION['user']=='travels'){
							  ?>
									<div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../travel_ride/select.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="TRIPS">
                                    </div></a>
                                  </div>
								  
								  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../request_tbl/select.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="BOOKINGS">
                                    </div></a>
                                  </div>
								  
								  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../profile/select.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="Profile">
                                    </div></a>
                                  </div>
								  
								  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <a href="../payments/select.php">    <div class="font-icon-detail"><i class="pe-7s-user"></i>
                                      <input type="text" value="payments">
                                    </div></a>
                                  </div>
								  <?php
							  }
							  ?>


								 

                                  

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

	

</html>
