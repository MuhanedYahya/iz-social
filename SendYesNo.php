
<?php
 require_once("connection.php");
 session_start();
 $date=date("Y-m-d h:i:s");
    
 if(isset($_POST["userID"])){
    $userID = Filtre($_POST["userID"]);
}else {
   $userID = "";
}
if(isset($_POST["Answer"])){
    $Answer = Filtre($_POST["Answer"]);

}else {
   $Answer = "";
}
if(isset($_POST["questionid"])){
    $questionid = Filtre($_POST["questionid"]);
}else {
   $questionid = "";
}

if(($userID != "") and ($Answer !="") and ($questionid !="") ){

    $Control = mysqli_query($connection , "SELECT * FROM recorded_information WHERE UserID = $userID AND QuestionID = $questionid ");
    @$controlRow = mysqli_num_rows($Control);
    if(!($controlRow >0)){
    


     
    if($Answer == "Yes"){
        $Add_Question_data = mysqli_query($connection,"INSERT INTO recorded_information(Date,Yes,QuestionID,UserID) 
        VALUES('$date',1,$questionid,$userID)");
        $Add_Question_data1 = mysqli_query($connection,"UPDATE questions SET Yes = Yes +1 WHERE QuestionID = $questionid");







        // send data to response by json array

        $Get_Question_row = mysqli_query($connection , "SELECT * FROM questions WHERE QuestionID = $questionid");
           $YesNo_array = mysqli_fetch_assoc($Get_Question_row);

           $Yes_No_AllAnswers = mysqli_query($connection , "SELECT * FROM recorded_information 
           WHERE QuestionID = $questionid AND UserID = $userID AND (Yes=1 OR No=1)");
           
           @$Yes_No_AllAnswersRow = mysqli_num_rows($Yes_No_AllAnswers);

           @$YesCount=  $YesNo_array["Yes"];
           @$NoCount =  $YesNo_array["No"];
           @$Resault = $YesCount + $NoCount;

           @$YesResault = ($YesCount/$Resault)*100;
           @$YesResault = number_format($YesResault,2);
           @$NoResault = ($NoCount/$Resault)*100;
           @$NoResault = number_format($NoResault,2);

           @$votersNumber= $YesNo_array["Yes"]+$YesNo_array["No"];;


           $json_array = array("votersNumber"=>$votersNumber, "YesResault"=>$YesResault, "NoResault"=>$NoResault);
           echo json_encode($json_array);


    
    }
    
    
    else if($Answer == "No"){
        $Add_Question_data = mysqli_query($connection,"INSERT INTO recorded_information(Date,No,QuestionID,UserID) 
        VALUES('$date',1,$questionid,$userID)");
        $Add_Question_data1 = mysqli_query($connection,"UPDATE questions SET No = No +1 WHERE QuestionID = $questionid");






        // send data to response by json array

         $Get_Question_row = mysqli_query($connection , "SELECT * FROM questions WHERE QuestionID = $questionid");
           $YesNo_array = mysqli_fetch_assoc($Get_Question_row);

           $Yes_No_AllAnswers = mysqli_query($connection , "SELECT * FROM recorded_information 
           WHERE QuestionID = $questionid AND UserID = $userID AND (Yes=1 OR No=1)");
           
           @$Yes_No_AllAnswersRow = mysqli_num_rows($Yes_No_AllAnswers);

           @$YesCount=  $YesNo_array["Yes"];
           @$NoCount =  $YesNo_array["No"];
           @$Resault = $YesCount + $NoCount;

           @$YesResault = ($YesCount/$Resault)*100;
           @$YesResault = number_format($YesResault,2);
           @$NoResault = ($NoCount/$Resault)*100;
           @$NoResault = number_format($NoResault,2);

           $votersNumber= $YesNo_array["Yes"]+$YesNo_array["No"];

           $json_array = array("votersNumber"=>$votersNumber, "YesResault"=>$YesResault, "NoResault"=>$NoResault);
           echo json_encode($json_array);




    }   
  

  


    }


   
    


}


?>