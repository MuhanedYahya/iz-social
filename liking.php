<?php 
  // connect to the database
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






$userid=$_SESSION["userID"];
$date=date("Y-m-d h:i:s");

  //add vote
  if (isset($_POST['vote'])) {
    $answerid = $_POST['answerid'];
    $result = mysqli_query($connection, "SELECT * FROM answers WHERE AnswerID=$answerid");
    $row = mysqli_fetch_array($result);
    $n = $row['Votes'];
    $Question_id = $row["QuestionID"];
    mysqli_query($connection, "UPDATE answers SET Votes=$n+1 WHERE AnswerID=$answerid");

    // record info
    mysqli_query($connection ,"INSERT INTO recorded_information(Date,Voted,AnswerID,UserID) 
             VALUES('$date',1,$answerid,$userid)");

    
    // Send Notification

     $Owner_id = $row["UserID"];

    $insert_Notification = mysqli_query($connection , "INSERT INTO notifications(notification_date,UserID , QuestionID  , QA_Owner_id , Voted)
      VALUES('$date',$userid,$Question_id,$Owner_id,1)");

       //pusher notification

              $All_Notifications = mysqli_query($connection , "SELECT * FROM notifications WHERE QA_Owner_id = $Owner_id");
              $All_Notifications_Row = mysqli_num_rows($All_Notifications);

              $data['message'] = $All_Notifications_Row;
              $pusher->trigger('my-channel', 'my-event', $data);


    echo $n+1;
    exit();
  }

    //remove vote
    if (isset($_POST['iptal_vote'])) {
    $answerid = $_POST['answerid'];
    $result = mysqli_query($connection, "SELECT * FROM answers WHERE AnswerID=$answerid");
    $row = mysqli_fetch_array($result);
    $n = $row['Votes'];
    mysqli_query($connection, "UPDATE answers SET Votes=$n-1 WHERE AnswerID=$answerid");

    // delete recorded 'nfo
    mysqli_query($connection,"DELETE FROM recorded_information WHERE AnswerID=$answerid AND Voted=1"); 

    //ajaxa ozel
    echo $n-1;
    exit();
  }


    //add unvote
  if (isset($_POST['unvote'])) {
    $answerid = $_POST['answerid'];
    $result = mysqli_query($connection, "SELECT * FROM answers WHERE AnswerID=$answerid");
    $row = mysqli_fetch_array($result);
    $n = $row['UnVotes'];
    $Question_id = $row["QuestionID"];

    mysqli_query($connection, "UPDATE answers SET UnVotes=$n+1 WHERE AnswerID=$answerid");

    // record info
    mysqli_query($connection ,"INSERT INTO recorded_information(Date,UnVoted,AnswerID,UserID) 
             VALUES('$date',1,$answerid,$userid)");

    
    // Send Notifications

     $Owner_id = $row["UserID"];

  $insert_Notification = mysqli_query($connection , "INSERT INTO notifications(notification_date,UserID , QuestionID  , QA_Owner_id , UnVoted)
              VALUES('$date',$userid,$Question_id,$Owner_id,1)");



              //pusher notification

              $All_Notifications = mysqli_query($connection , "SELECT * FROM notifications WHERE QA_Owner_id = $Owner_id");
              $All_Notifications_Row = mysqli_num_rows($All_Notifications);

              $data['message'] = $All_Notifications_Row;
              $pusher->trigger('my-channel', 'my-event', $data);





    //ajaxa ozel
    echo $n+1;
    exit();
  }


  

    //remove unvote
  if (isset($_POST['iptal_unvote'])) {
    $answerid = $_POST['answerid'];
    $result = mysqli_query($connection, "SELECT * FROM answers WHERE AnswerID=$answerid");
    $row = mysqli_fetch_array($result);
    $n = $row['UnVotes'];
    mysqli_query($connection, "UPDATE answers SET UnVotes=$n-1 WHERE AnswerID=$answerid");

    // delete recorded 'nfo
    mysqli_query($connection,"DELETE FROM recorded_information WHERE AnswerID=$answerid AND UnVoted=1"); 


    //ajaxa ozel
    echo $n-1;
    exit();
  }
  


  // $posts = mysqli_query($con, "SELECT * FROM questions");


?>