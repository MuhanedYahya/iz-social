
<?php
 require_once("connection.php");
 session_start();
    
 if(isset($_POST["userID"])){
    $userID = Filtre($_POST["userID"]);
}else {
   $userID = "";
}
if(isset($_POST["selected_Option"])){
    $selected_Option = Filtre($_POST["selected_Option"]);
}else {
   $selected_Option = "";
}
if(isset($_POST["questionid"])){
    $questionid = Filtre($_POST["questionid"]);
}else {
   $questionid = "";
}

if(($userID != "") and ($selected_Option !="") and ($questionid !="") ){

    $Control = mysqli_query($connection , "SELECT * FROM recorded_information WHERE UserID = $userID AND QuestionID = $questionid ");
    @$controlRow = mysqli_num_rows($Control);
 if(!($controlRow >0)){
     $date=date("Y-m-d h:i");

    $Add_Optional_Question_Answer = mysqli_query($connection,"INSERT INTO recorded_information(Date,Optional_Answer,QuestionID,UserID) 
    VALUES('$date','$selected_Option',$questionid,$userID)");


        // send json array to response



        $GetOptions = mysqli_query($connection , "SELECT * FROM questions WHERE QuestionID = $questionid");
        $OptionsCount = mysqli_num_rows($GetOptions);
        $Options = mysqli_fetch_assoc($GetOptions);
        $AllAnswers = mysqli_query($connection , "SELECT * FROM recorded_information WHERE QuestionID = $questionid");
        @$AllAnswersRow = mysqli_num_rows($AllAnswers);
        // if($AllAnswersRow == 0){
        //     $AllAnswersRow = 1;
        // }
        $OptionsNumber = 0;

        $degisken = array();

        $color="";
        
        for($i = 1 ; $i<6;$i++){
        $Option=$Options["Option$i"];
        $SelectedOption = mysqli_query($connection , "SELECT * FROM recorded_information WHERE Optional_Answer= '$Option' AND QuestionID = $questionid");
        @$optionRow = mysqli_num_rows($SelectedOption);
        @$optionselect = ($optionRow / $AllAnswersRow ) * 100;
        @$optionselect = number_format($optionselect,2);
        @$degisken[$i] = $optionselect;
        if($Option != ""){

            $OptionsNumber = $OptionsNumber + 1;


                if ($Options["Correct_Option"]=="") {
            if($selected_Option == $Option){
                $Correct_option_color ="blue";
                $others_options_color = "blue";
                $Correct_option_number = $i;
            } 

        } 
        else{

            if ($selected_Option == $Option and $selected_Option ==$Options["Correct_Option"]
                or $Option==$Options["Correct_Option"] ){

            $Correct_option_color ="green";
            $others_options_color = "red";
            $Correct_option_number = $i;


            } 
        
        } 
        }

      

        // for end
        }




        $json_array = array("others_options_color" => $others_options_color ,"Correct_option_color" =>$Correct_option_color ,"Correct_option_number" => $Correct_option_number ,"OptionsNumber" => $OptionsNumber,"votersNumber"=>$AllAnswersRow,"option_1_percent"=>$degisken['1'],"option_2_percent"=>$degisken['2'],"option_3_percent"=>$degisken['3']
      ,"option_4_percent"=>$degisken['4'],"option_5_percent"=>$degisken['5']);
        echo json_encode($json_array);
















   

    }

}


?>