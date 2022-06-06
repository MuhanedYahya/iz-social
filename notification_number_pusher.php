<?php

require_once("connection.php");
    session_start();
    $SessionUserId=$_SESSION["userID"];

    $All_Notifications = mysqli_query($connection , "SELECT * FROM notifications WHERE QA_Owner_id = $SessionUserId AND Seen=0");
    $All_Notifications_Row = mysqli_num_rows($All_Notifications);


      if ($All_Notifications_Row>0){
          ?>

                    <div class="Notifications_icon_number">
                        <?php echo $All_Notifications_Row; ?>
                    </div>
        <?php }


?>