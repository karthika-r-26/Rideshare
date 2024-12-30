<?php
include('header.php');
include('connection.php');

date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['ccc']))
{
    $date = date('Y-m-d H:i:s');
    mysqli_query($con,"INSERT INTO chat(sid,message,date_time,userid) VALUES('$_REQUEST[id]','$_POST[msgd]','$date','$_SESSION[uid]')");
	//echo "INSERT INTO chat(sid,message,date_time,userid) VALUES('$_REQUEST[id]','$_POST[msgd]','$date','$_SESSION[uid]')";
    header("location:user_chat.php?id=$_REQUEST[id]");
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

		<!-- end:header-top -->
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}

.rh_page__main {
    width: 100%;
}


        .chat-wrapper{
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 10px;
            height: 400px;
            overflow-y: scroll;
            flex-direction: column;
            display: flex;
            flex-direction: column-reverse; /* Reverse the order of the messages */
        }

        .message-wrapper {
            margin-bottom: 10px;
        }

        .message-bubble {
            display: inline-block;
            max-width: 70%;
            padding: 10px;
            border-radius: 10px;
            color: #434242;
            font-size: 14px;
        }

        .message-bubble1 {
            display: inline-block;
            max-width: 70%;
            padding: 10px;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
        }

        .sent-bubble {
            background-color: #0695FF;
            align-self: flex-end;
        }

        .received-bubble {
            background-color: #fff;
            align-self: flex-start;
        }

        .message-time {
            font-size: 12px;
            color: #777;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .message-input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 14px;
        }

        .send-button {
            background-color: #5BC0F8;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 50%;
            margin-left: 5px;
            cursor: pointer;
        }

        .send-button i {
            font-size: 16px;
        }

        .chat-header {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 10px;
        }

        .chat-header-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .chat-header-name {
            font-weight: bold;
        }
		
		.container {
			
		}
    </style>
	
<div id="fh5co-tours" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="market-update-block">
                    <div class="">
                        <h4>Rideshare Chat</h4>
                        <div class="row justify-content-between">
                            <div class="" style="background-color: aqua; padding:10px">
                                <!-- Chat Header -->
                                <?php
								if($_REQUEST['id']!='')
								{
								?>
								
								<!-- Chat Header -->
								<?php
								$sel = mysqli_query($con, "SELECT * FROM `user` WHERE id='$_REQUEST[id]'");
								while ($row = mysqli_fetch_array($sel)) {
								?>
								<div class="chat-header">
									<a title="">User :<?php echo $row['name'] ?></a>
								</div>
								<?php
								}
								?>
								<!-- Chat Messages -->
								<div class="chat-wrapper" id="message">
									<?php
									$sel = "SELECT * FROM chat WHERE (userid='$_SESSION[uid]' and sid='$_REQUEST[id]')  OR  (userid='$_REQUEST[id]' and sid='$_SESSION[uid]')  ORDER BY id DESC";
								    //echo $sel;
									$result = mysqli_query($con, $sel);
									$rows = mysqli_num_rows($result);
									while($row = mysqli_fetch_array($result))
									{
										$time24Hr = $row['date_time']; 
										$time12Hr = date("h:i A", strtotime($time24Hr));
										if($row['userid'] == $_SESSION['uid'])
										{
											echo "<div class='message-wrapper sent' style='text-align:right'>";
											echo "<div class='message-bubble1 sent-bubble' style='text-align:right'>";
											echo "<span class='message-text' style='text-align:right'>$row[message]</span>";
											echo "<br>";
											echo "<span class='message-time' style='text-align:right'>$time12Hr</span>";
											echo "</div>";
											echo "</div>";
										}
										else
										{
											echo "<div class='message-wrapper received'>";
											echo "<div class='message-bubble received-bubble'>";
											echo "<span class='message-text'>$row[message]</span>";
											echo "<br>";
											echo "<span class='message-time'>$time12Hr</span>";
											echo "</div>";
											echo "</div>";
										}
									}
									?>
								</div>
                                <!-- Message Input -->
                                <form action="" method="post">
                                    <div class="input-wrapper">
                                        <input type="text" class="message-input" name="msgd" placeholder="Message" required>
                                        <button type="submit" class="send-button" name="ccc"><i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </form>
								<?php
								}
								?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4" style="background-color: #deffe3; border-radius: 8px; margin-left: 50px;">
                <div class="market-update-block">
                    <div class="">
                        <h4>Users</h4>
                        <?php
                        $sel = "select distinct userid from chat where sid='$_SESSION[uid]'";
						//echo $sel;
                        $result = mysqli_query($con,$sel);
                        while($row = mysqli_fetch_array($result))
                        {
                            $s1 = mysqli_query($con,"select * from user where id='$row[userid]'");
                            $cc = mysqli_fetch_array($s1);
                        ?>
                        <p><a href="user_chat.php?id=<?php echo $row['userid']; ?>"><?php echo $cc['name']; ?></a></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>






	<?php
	include('footer.php');
	?>
