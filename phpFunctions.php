 <?php
require_once("connection.php");
    session_start();
    $SessionUserId=$_SESSION["userID"];

require __DIR__ . '/vendor/autoload.php';

    $options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '478ca7a0943e80ca8d92',
    'eeafa8ef9d108d8c243d',
    '1245461',
    $options
  );


         // for Adding reply in home posts 

     if (isset($_POST["Reply"])) {
        $id=$_POST["Question_id"];
        $comment=Filtre($_POST['comment']);
        $date=date("Y-m-d h:i");
        $userid=$_SESSION["userID"];

        $Question_Owner = mysqli_query($connection , "SELECT * FROM questions WHERE QuestionID= $id");
        $Owner_info = mysqli_fetch_assoc($Question_Owner);
        $Owner_id = $Owner_info["UserID"];

      if ($comment=="") {
        ?>
        <script>
        alert("You can not add an empty question");
        </script>
        <?php
       }


       else {
          $insert_query=mysqli_query($connection ,"INSERT INTO answers(Answer,Answer_Date,Votes,UnVotes,QuestionID,UserID) 
             VALUES('$comment','$date',0,0,$id,$userid)");


              // adding notification
              $time=date("Y-m-d h:i:s");

              $insert_Notification = mysqli_query($connection , "INSERT INTO notifications(notification_date, UserID , QuestionID  , QA_Owner_id , Answered  )
              VALUES('$time',$userid,$id,$Owner_id,1)");

              //pusher notification

              $All_Notifications = mysqli_query($connection , "SELECT * FROM notifications WHERE QA_Owner_id = $Owner_id");
              $All_Notifications_Row = mysqli_num_rows($All_Notifications);

              $data['message'] = $All_Notifications_Row;
              $pusher->trigger('my-channel', 'my-event', $data);



              echo "";
              exit();
       }


    }


    

         // for Adding reply in Question_Preview posts 

     if (isset($_POST["Answer_Reply"])) {
        $Question_id=$_POST["questinID"];
        $Answer_id=$_POST["Answer_id"];
        $comment=Filtre($_POST['comment']);
        $date=date("Y-m-d h:i");
        $userid=$_SESSION["userID"];
        
      if ($comment=="") {
        ?>
        <script>
        alert("You can not add an empty question");
        </script>
        <?php
       }


       else {
          $insert_query=mysqli_query($connection ,"INSERT INTO answers(Answer,Answer_Date,Votes,UnVotes,QuestionID,Parent_Answer_ID,UserID) 
             VALUES('$comment','$date',0,0,$Question_id,$Answer_id,$userid)");



            // adding notification
            $time=date("Y-m-d h:i:s");

            if ($Answer_id!="") {
              $Answer_Owner = mysqli_query($connection , "SELECT * FROM answers WHERE AnswerID= $Answer_id");
              $Owner_info = mysqli_fetch_assoc($Answer_Owner);
              $Owner_id = $Owner_info["UserID"];

             $insert_Notification = mysqli_query($connection , "INSERT INTO notifications(notification_date , UserID , QuestionID , QA_Owner_id , Answered , Parent_Answer_ID )
              VALUES('$time',$userid,$Question_id,$Owner_id,1,$Answer_id)");

              //pusher notification

              $All_Notifications = mysqli_query($connection , "SELECT * FROM notifications WHERE QA_Owner_id = $Owner_id");
              $All_Notifications_Row = mysqli_num_rows($All_Notifications);

              $data['message'] = $All_Notifications_Row;
              $pusher->trigger('my-channel', 'my-event', $data);

        }

        else {
          $Question_Owner = mysqli_query($connection , "SELECT * FROM questions WHERE QuestionID= $Question_id");
        $Owner_info = mysqli_fetch_assoc($Question_Owner);
        $Owner_id = $Owner_info["UserID"];

        $insert_Notification = mysqli_query($connection , "INSERT INTO notifications(notification_date , UserID , QuestionID , QA_Owner_id , Answered)
              VALUES('$time',$userid,$Question_id,$Owner_id,1)");


              //pusher notification

              $All_Notifications = mysqli_query($connection , "SELECT * FROM notifications WHERE QA_Owner_id = $Owner_id");
              $All_Notifications_Row = mysqli_num_rows($All_Notifications);

              $data['message'] = $All_Notifications_Row;
              $pusher->trigger('my-channel', 'my-event', $data);
          
        }


            


              echo "";
              exit();
       }


    }









      // notification clear

      if (isset($_POST["Mark_all_as_read"])) {
        $userid=$_SESSION["userID"];

          mysqli_query($connection , "UPDATE notifications SET Seen=1 WHERE QA_Owner_id=$userid"); 

      }


      if (isset($_POST["Clear_all_notification"])) {
        $userid=$_SESSION["userID"];

          mysqli_query($connection , "DELETE FROM notifications WHERE QA_Owner_id=$userid"); 

      }






















        // for deleteing question in profileEditor

        if (isset($_POST['Delete_Question'])) {
            $id=$_POST["Question_id"];

            //collect all answers related to this question
           $collectAnswers=mysqli_query($connection,"SELECT * FROM `answers` WHERE QuestionID=$id");

          while($Answers = mysqli_fetch_assoc($collectAnswers)){


            $Answerid=$Answers["AnswerID"];

          // delete recorded info related to Answers 
          mysqli_query($connection,"DELETE FROM recorded_information WHERE AnswerID=$Answerid AND Voted=1");      
          mysqli_query($connection,"DELETE FROM recorded_information WHERE AnswerID=$Answerid AND UnVoted=1"); 
         
         
          }
          mysqli_query($connection,"DELETE FROM answers WHERE QuestionID=$id");     
          mysqli_query($connection,"DELETE FROM questions WHERE QuestionID=$id");  
     
     
         }

           






      // Deleteing Answer in QuestionPreview and profileEditor
      if (isset($_POST['delete_Answer'])) {
       $AnswerID=$_POST["AnswerID"];

      // collecting all answers related to this answer
        $collect=mysqli_query($connection,"SELECT * FROM `answers` WHERE Parent_Answer_ID=$AnswerID");
        while($Answers_with_parent = mysqli_fetch_assoc($collect)){
            $ID=$Answers_with_parent["AnswerID"];

             // deleting all info related to the related answer
       mysqli_query($connection,"DELETE FROM recorded_information WHERE AnswerID=$ID AND Voted=1");      
       mysqli_query($connection,"DELETE FROM recorded_information WHERE AnswerID=$ID AND UnVoted=1");      
       mysqli_query($connection,"DELETE FROM answers WHERE AnswerID=$ID");  
        }

       mysqli_query($connection,"DELETE FROM recorded_information WHERE AnswerID=$AnswerID AND Voted=1");      
       mysqli_query($connection,"DELETE FROM recorded_information WHERE AnswerID=$AnswerID AND UnVoted=1");   
       $DeleteAnswers=mysqli_query($connection,"DELETE FROM answers WHERE AnswerID=$AnswerID");       

      }

           

       













       // live Search

        if (isset($_POST['search'])) {

          $userID=$_POST['userID'];
          $text=Filtre($_POST['search']);

          $sql="SELECT * FROM questions WHERE Question LIKE '%".$text. "%'";
          $resault=mysqli_query($connection,$sql);
          $output='';

          if (mysqli_num_rows($resault)>0) {

            while ($row=mysqli_fetch_assoc($resault)) {
              $output .='
              <a href="QuestionPreview.php?userID='.$userID.'&QuestionID='.$row["QuestionID"].'" class="search_link">
                  <div class="flex_row_start search_resault_text">
                        '.$row["Question"].'
                  </div>
              </a>';

            }

            echo $output;


          }


          else{
            $output .='
                <div class="rowflex search_resault_text">

                  <div style="margin-right:5px">
                    <span class="material-icons" style="font-size:25;margin-right:10px;color:#4B536E">
                      sentiment_very_dissatisfied
                    </span>
                  </div>

                  <div>data not found</div>
                  
                        
                </div>

                  
              ';


            echo $output;
          }


            
     
     
         }










?>
