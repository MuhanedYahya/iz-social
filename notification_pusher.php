<?php

require_once("connection.php");
    session_start();
    $SessionUserId=$_SESSION["userID"];


    
        $All_Notifications = mysqli_query($connection , "SELECT * FROM notifications WHERE QA_Owner_id = $SessionUserId");
        $All_Notifications_Row = mysqli_num_rows($All_Notifications);




if($All_Notifications_Row > 0){

        while($Notifications = mysqli_fetch_assoc($All_Notifications)){
        $Notification_user_id = $Notifications["UserID"];

        $Get_user_name = mysqli_query($connection , "SELECT * FROM users WHERE UserID  = $Notification_user_id");
        $User_info = mysqli_fetch_assoc($Get_user_name);
        $User_Name = $User_info["Name"];

        if($Notifications["Answered"] != ""){
        $Message = "answered your question";
        }
        if($Notifications["Voted"] != ""){
        $Message = "support your answer";

        }
        if($Notifications["UnVoted"] != ""){
        $Message = "did not support your answer";

        }
        if ($Notifications["Parent_Answer_ID"]!="") {
        $Message = "replied to your answer";
        }

        ?>
            <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo $Notifications["QuestionID"];?>" 
            target="_blank" class="notification_link">

                <div class="flex_space one_notification_div">
                    <div class="flex_row_start" style="order:1;width:90%">
                        <div>
                            <div class="smallPicDiv" style="order: 1;width:45;height:45;
                            margin-right:10px;background-image: url(user_images/<?php echo $User_info["Profile_Picture"];?>)"></div>
                        </div>

                        <div class="flex_column_start">
                            <div style="font-weight:bold;font-size:14px">
                                <?php echo $User_Name; ?>
                            </div>
                            <div style="font-size:14px;color:#7B8CA0" id="receved_not">
                                <?php echo $Message; ?>
                            </div>
                        </div>



                    </div>
                    

                    <div class="flex_column_start" style="order:2;width:10%">
                        

                        <div class="flex_column_end">
                            <div  style="font-size:11px;color:#7B8CA0">
                                <?php
                                $date=date("h:i",strtotime($Notifications["notification_date"]));
                                echo $date; 
                                ?>
                            </div>

                            <?php if ($Notifications["Seen"]==0) {?>
                            <div style="align-self: flex-end" class="unSeen_icon">
                                <i class="fas fa-circle font-adjust" style="font-size:10px;color:#1167B1;margin-top:8px"></i>
                            </div>
                            <?php }else{?>
                                <div style="align-self: flex-end" class="history_icon">
                                <i class="fas fa-history font-adjust" style="font-size:15px;color:#d6d6d6;margin-top:8px"></i>
                                </div>
                            <?php }?>

                        </div>

                    </div>


                    <!-- one_notification_div end -->
                </div>
            </a>
        <?php
            }}
            else{
        ?>

        <div class="rowflex" >
            You don't have notifications yet
        </div>

        <?php
        }



























        
    ?>