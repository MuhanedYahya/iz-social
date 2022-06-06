
<?php
 require_once("connection.php");
 session_start();
  $time = date("Y-m-d h:i");

 if(isset($_POST["optional_Question"])){
      $optional_Question = Filtre($_POST["optional_Question"]);
 }else {
     $optional_Question = "";
 }
 if(isset($_POST["correct_option"])){
      $correct_option = Filtre($_POST["correct_option"]);
 }else {
     $correct_option = "";
 }
 if(isset($_POST["selected_section"])){
      $selected_section = Filtre($_POST["selected_section"]);
 }else {
     $selected_section = "";
 }
  if(isset($_POST["option1"])){
      $option1 = Filtre($_POST["option1"]);
 }else {
     $option1 = "";
 }
 if(isset($_POST["option2"])){
      $option2 = Filtre($_POST["option2"]);
 }else {
     $option2 = "";
 }
 if(isset($_POST["option3"])){
      $option3 = Filtre($_POST["option3"]);
 }else {
     $option3 = "";
 }
 if(isset($_POST["option4"])){
      $option4 = Filtre($_POST["option4"]);
 }else {
     $option4 = "";
 }
 if(isset($_POST["option5"])){
      $option5 = Filtre($_POST["option5"]);
 }else {
     $option5 = "";
 }
 if(isset($_POST["userID"])){
      $UserID = Filtre($_POST["userID"]);
 }else {
     $UserID = "";
 }



      if(($optional_Question != "") and ($selected_section != "") and  ($option1 != "")and  ($option2 != "")and  ($UserID != "")){

         $AddQuestion = mysqli_query($connection , "INSERT INTO questions(Question,UserID,Question_type,Section_Name,Question_Date,Option1,Option2,Option3,Option4,Option5,Correct_Option)
          VALUES('$optional_Question',$UserID,2,'$selected_section','$time','$option1','$option2','$option3','$option4','$option5','$correct_option')");

      }
      


?>