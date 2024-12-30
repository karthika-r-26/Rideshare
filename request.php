<?php
include('connection.php');
session_start();

if(isset($_REQUEST['id']))
{
	$travel=$_REQUEST['id'];
	$user=$_SESSION['uid'];
	$date=$date=date('Y-m-d H:i:s');
	
	$res=mysqli_query($con,"INSERT INTO `request_tbl`(`user_id`, `travel_id`, `date`, `status`,price) VALUES('$user','$travel','$date','requested','$_REQUEST[amt]')");
	if($res)
	  {
		  
	  echo '<script>
			alert("Travels Requested!")
		  window.location="view_travel_booking.php";
		  </script>';
	  }
	
}


?>

