
<?php
 require_once("connection.php");
 session_start();

 $time = date("Y-m-d h:i");

 if(isset($_POST["standard_Question"])){
      $standard_Question = Filtre($_POST["standard_Question"]);
 }else {
      $standard_Question = "";
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


      if(($standard_Question != "") and  ($selected_section != "") and ($UserID != "")){

         $AddQuestion = mysqli_query($connection , "INSERT INTO questions(Question,UserID,Question_type,Section_Name,Question_Date)
          VALUES('$standard_Question',$UserID,1,'$selected_section','$time')");
         

      }
      



?>