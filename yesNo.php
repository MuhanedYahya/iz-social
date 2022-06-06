
<?php
 require_once("connection.php");
 session_start();
      $time = date("Y-m-d h:i");


 if(isset($_POST["yesNo_Question"])){
      $yesNo_Question = Filtre($_POST["yesNo_Question"]);
 }else {
     $yesNo_Question = "";
 }
 if(isset($_POST["selected_section"])){
      $selected_section = Filtre($_POST["selected_section"]);
 }else {
     $selected_section = "";
 }
 if(isset($_POST["userID"])){
      $UserID = Filtre($_POST["userID"]);
 }else {
     $UserID = "";
 }

      if(($yesNo_Question != "") and  ($selected_section != "") and ($UserID != "")){

         $AddQuestion = mysqli_query($connection , "INSERT INTO questions(Question,UserID,Question_type,Section_Name,Question_Date)
          VALUES('$yesNo_Question',$UserID,3,'$selected_section','$time')");

         

      }
      



?>