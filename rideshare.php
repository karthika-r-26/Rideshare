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
                <div class="col-md-12 animate-box">
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $start=$_POST['start'];
                        $destination=$_POST['destination'];
                        $date=$_POST['date'];

                        $datetime = DateTime::createFromFormat('m/d/Y', $date);
                        $formatted_date = $datetime->format('Y-m-d');

                        $sel="select * from trip_tbl where start='$start' and destination='$destination' and date='$formatted_date' and seats!='0' and user_id!='$_SESSION[uid]'";
                        $res=mysqli_query($con,$sel);
                        $rows=mysqli_num_rows($res);
                        if($rows>0)
                        {
                            while($row=mysqli_fetch_array($res))
                            {
                                $s=mysqli_query($con,"select * from user where id='$row[user_id]'");
                                $c=mysqli_fetch_array($s);
                                ?>
                                <br><br>
                                <a href="book.php?id=<?php echo $row['id'] ?>" class="flight-book">
                                    <div class="plane-name">
                                        <span class="p-flight"><?php echo $c['name'] ?></span><br>
                                        <span class="p-flight">Vehicle: <?php echo $row['vehicle'] ?></span> ||
                                        <span class="p-flight">Vehicle No: <?php echo $row['vehicle_no'] ?></span> 
                                    </div>
                                    <div class="desc">
                                        <div class="left">
                                            <h4><?php echo $row['start'] ?>-<?php echo $row['destination'] ?></h4>
                                            <span><?php echo $row['date'] ?></span> ||
                                            <span><?php echo $row['time'] ?></span> ||
                                            <span>Avaliable seats: <?php echo $row['seats'] ?></span> 
                                        </div>
                                        <div class="right">
                                            <span class="price">
                                                ₹<?php echo $row['fare'] ?>
                                            </span>
                                            <!-- Chat link -->
                                            
                                        </div>
                                    </div>
									<span class="chat-link" style="float:right">
										<a href="chat.php?id=<?php echo $row['user_id'] ?>" style="float: right;font-size: 23px;"><i class="fas fa-comment"></i> Chat</a>
									</span>
                                </a>
                                <br>

                                <?php
                            }

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
