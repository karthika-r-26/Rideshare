<?php
include('header.php');
include("connection.php");

date_default_timezone_set('Asia/Kolkata');
// Assuming the current date and time
//$currentDateTime = date('Y-m-d H:i:s');

// Convert to 12-hour format
//$currentDateTime12Hr = date("d-m-Y h:i A", strtotime($currentDateTime));

//echo "111".$currentDateTime12Hr; // Output: current date and time in 12-hour format



if(isset($_POST['ccc']))
{
    $date = date('Y-m-d H:i:s');
    mysqli_query($con,"INSERT INTO chat(sid,message,date_time,userid) VALUES('$_SESSION[uid]','$_POST[msgd]','$date','$_REQUEST[id]')");
	//echo "INSERT INTO chat(sid,message,date_time,userid) VALUES('$_SESSION[uid]','$_POST[msgd]','$date','$_REQUEST[id]')";
    header("location:chat.php?id=$_REQUEST[id]");
}

if(isset($_POST['ccc1']))
{
    $date = date('Y-m-d H:m');
    mysqli_query($con,"UPDATE chat SET reply='$_POST[replay]',reply_date='$date' WHERE id='$_POST[cid]'");
    header("location:chat.php?id=$_REQUEST[id]");
}
?>


<style>

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
</style>
  <section class="about_section layout_padding" style="min-height:600px;">
    <div class="container" style="background-color:white; border-radius:20px; padding:50px;">
      <div class="row">
        <div class="col-md-12">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Chat
              </h2>
            </div>
			<br>
          
			<div class="container">
                            <!-- Chat Header -->
                            <?php
                            $sel = mysqli_query($con, "SELECT * FROM `user` WHERE id='$_REQUEST[id]'");
                            while ($row = mysqli_fetch_array($sel)) {
                            ?>
                            <div class="chat-header">
                                <img class="chat-header-image" src="images/user.png" alt="Profile Image">
                                <h4><?php echo $row['name'] ?></h4>
                            </div>
                            <?php
                            }
                            ?>
                            <!-- Chat Messages -->
                            <div class="chat-wrapper" id="message">
                                <?php
                                $sel = "SELECT * FROM chat WHERE (userid='$_SESSION[uid]' and sid='$_REQUEST[id]')  OR  (userid='$_REQUEST[id]' and sid='$_SESSION[uid]')  ORDER BY id DESC";
                                $result = mysqli_query($con, $sel);
                                $rows = mysqli_num_rows($result);
                                while($row = mysqli_fetch_array($result))
                                {
                                    $currentDateTime = $row['date_time']; 
                                    //$time12Hr = date("h:i A", strtotime($time24Hr));
									
									$currentDateTime12Hr = date("d-m-Y h:i A", strtotime($currentDateTime));
                                    if($row['sid'] == $_SESSION['uid'])
                                    {
                                        echo "<div class='message-wrapper sent' style='text-align:right'>";
                                        echo "<div class='message-bubble1 sent-bubble' style='text-align:right'>";
                                        echo "<span class='message-text' style='text-align:right'>$row[message]</span>";
                                        echo "<br>";
                                        echo "<span class='message-time' style='text-align:right'>$currentDateTime12Hr</span>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    else
                                    {
                                        echo "<div class='message-wrapper received'>";
                                        echo "<div class='message-bubble received-bubble'>";
                                        echo "<span class='message-text'>$row[message]</span>";
                                        echo "<br>";
                                        echo "<span class='message-time'>$currentDateTime12Hr</span>";
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
                                    <button type="submit" class="send-button" name="ccc"><i class="fa-solid fa-paper-plane"></i>send</button>
                                </div>
                            </form>
                        </div>
		  
		  
		  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->





  
  <?php
  include('footer.php');
  ?>