<?php
require_once("connection.php");
    session_start();
    $SessionUserId =  $_SESSION["userID"];
if ($_SESSION["userID"]==""){
     header("Location:Login.php");
}
?>


<html lang="en">
<head>
    <link rel="icon" href="images/students_32px.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">  
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" href="Second_index.css">
    <link rel="stylesheet" href="Question.css">
    <link rel="stylesheet" href="Question_Preview.css">
    <title>IZU SOCIAL</title>
</head>
<body style="padding-bottom:50px">

<div class="Question_Container_fixed_div">

 <div class="Add_Question_Container" >
    

 <div class="Questions_Header" style="order:1">
    <div class="Close">
        <span class="material-icons " style="color:#2D3138;font-size:30;cursor:pointer"  id="close_Question_Div" alt="close">
             close
        </span>
    </div>


    <div  class="QuestionTypes_icons_div">

       <div class="QuestionTypes_icons showStandard" style="border-bottom-style:solid;">
        <span class="material-icons scale_motion" style="font-size:30;padding-right:3px;color:#4B536E">
         lightbulb
        </span>
         <div class="hidden-standard-title">
            <div style="text-align: center;">
            Standard Question
            </div>
        </div>
       
       </div>

       <div class="QuestionTypes_icons showOptional">
        <span class="material-icons scale_motion" style="font-size:30;padding-right:3px;color:#4B536E">
           format_list_bulleted
        </span>

        <div class="hidden-optional-title">
            <div>
            Optional Question
            </div>
        </div>
        
       </div>
       <div class="QuestionTypes_icons  showYesNo">
        <span class="material-icons scale_motion" style="font-size:30;padding-right:3px;color:#4B536E">
           flaky
        </span>

        <div class="hidden-yesNo-title">
            <div>
            Yes/No Question
            </div>
        </div>
      
       </div>

    

    </div>



 </div>



 <div class="Question_Rules_box" style="order: 2;">
        <h6 style="margin-bottom: 10px;font-weight: bold;">Tips on getting good answers quickly</h6>
        <ul>
            <li>Make sure your question has not been asked already</li>
            <li>Keep your question short and to the point</li>
            <li>Double-check grammar and spelling</li>
        </ul>
 </div>


    <div class="Questioner" style="order:3">

        <div class="RowClass userDiv" style="order:1">

            <div class="done">
              <span class="material-icons" style="color:#2E69FF;font-size:30;margin:0px 0px 0px 10px">
                done
              </span>
            </div>

             <div class="smallPicDiv" style="min-width:33;min-height:33;margin:0px 10px 0px 10px;max-width:33;max-height:33;
             background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
            

            <h6 style="word-wrap: break-word;font-weight:bold">
                <?php
                 echo $_SESSION["Name"];
                ?>
            </h6>

            
            
            
        </div>

           

        <div class="RowClass AnonymousDiv" style="order:2">
           <div style="display:none" class="done">
              <span class="material-icons" style="color:#2E69FF;font-size:30;margin:0px 0px 0px 10px">
                done
              </span>
            </div>
             <span class="material-icons" style="color:#2D3138;font-size:33;margin:0 10px 0 10px">
             visibility_off
            </span>
             <h6>
                Anonymous
            </h6>

             



        </div>
        


       


        
    </div>


 <div class="Standart_Question" style="order:4;">
    <div class="Text_Area_Div" style="order:1">
        <textarea name="Standard_Textarea" class="Question_input" 
            placeholder='Start your question with "What", "How", "Why", etc.' maxlength="300" 
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)" required></textarea>
    </div>

     <div class="Question_Error_Div" style="order:2;display:none;" id="standard_Error">
 
     </div>

 </div>



 <div class="Optional_Question" style="order:4;display:none">

    <div class="Text_Area_Div">
        <textarea name="optional_Textarea" class="Optional_Question_input" style="min-height: 60px;"
            placeholder='Write Your Optional Question' maxlength="300" required
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
    </div>

    <div class="Option_Div">
        <div>
        <span class="material-icons correct_option" style="color:#C1CCD6;font-size:25;cursor:pointer;">
           check_box
        </span>
       </div>
     <input type="text" class="Option" placeholder="Option" required id="option1">
    </div>

    <div class="Option_Div">
        <div>
            <span class="material-icons correct_option" style="color:#C1CCD6;font-size:25;cursor:pointer;">
          check_box
        </span>
        </div>
     <input type="text" class="Option" placeholder="Option" required id="option2">
    </div>

    <div class="Option_Div" style="display:none">
        <div>
            <span class="material-icons correct_option" style="color:#C1CCD6;font-size:25;cursor:pointer;">
           check_box
        </span>
        </div>
     <input type="text" class="Option" placeholder="Option" required id="option3">

     <div>
         <span class="material-icons removeOption" style="color:#2D3138;font-size:23;cursor:pointer;">
             close
      </span>
     </div>

    </div>

    <div class="Option_Div" style="display:none">
        <div>
            <span class="material-icons correct_option" style="color:#C1CCD6;font-size:25;cursor:pointer;">
           check_box
        </span>
        </div>
     <input type="text" class="Option" placeholder="Option" required id="option4">
     <div>
         <span class="material-icons removeOption" style="color:#2D3138;font-size:23;cursor:pointer;">
              close
      </span>
     </div>

    </div>


    
    <div class="Option_Div" style="display:none">
        <div>
            <span class="material-icons correct_option" style="color:#C1CCD6;font-size:25;cursor:pointer;">
           check_box
        </span>
        </div>
     <input type="text" class="Option" placeholder="Option" required id="option5">
     <div>
         <span class="material-icons removeOption" style="color:#2D3138;font-size:23;cursor:pointer;">
              close
      </span>
     </div>

    </div>



     <div style="margin-top:10px;" class="addOptions">
      <span class="material-icons " style="color:#2D3138;font-size:25;cursor:pointer;">
             add
      </span>
     </div>

     <div class="Question_Error_Div" style="order:2;display:none;" id="optional_Error">
 
     </div>




 </div>



 <div class="YesNo_Question" style="order:4;display:none">
 
    <div class="Text_Area_Div" >
        <textarea name="YesNo_Textarea" class="YesNo_Question_input" 
            placeholder='Write Your Yes/No Question' maxlength="300" required
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
    </div>

    <div class="yesNo_container">
        <div class="YesNo_div">
            <div class="yesNo_Font">
                Yes
            </div>

            <div class="oran">
                0%
            </div>

        </div>

        <div class="YesNo_div" style="background-image:linear-gradient(to right,#DE535E, white);">
            <div class="yesNo_Font">
                No
            </div>

             <div class="oran">
                0%
            </div>

        </div>
    </div>


     <div class="Question_Error_Div" style="order:2;display:none;" id="yesNo_Error">
 
     </div>

 </div>




 <div class="Questions_footer" style="order:5">

     <div class="btn-group rowflex" style="order:1">
    <div>
       <span class="material-icons" style="color:#2D3138;font-size:33;margin:0 10px 0 10px">
             groups
        </span>
    </div>
    <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <h6 class="secilmis-group text-wrap">
    Tüm izü öğrencileri/öğretmenleri
    </h6>  
    </div>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item group" href="#">Tüm izü <br> öğrencileri/öğretmenleri</a>
    <a class="dropdown-item group" href="#">Bölümün tüm <br>öğrencileri/öğretmenleri</a>
    <a class="dropdown-item group" href="#">Bölüm öğrencileri</a>
    <a class="dropdown-item group" href="#">Bölüm öğretmenleri</a>
     </div>
    </div> 






    <div style="order:2;margin-top:10px">
         <button class="footer_Button" data-id="<?php echo $_SESSION["userID"]; ?>">
             <div>Add</div>
             <div>
            <span class="material-icons" style="color:white;font-size:25;margin:0 10px 0 10px">
             done_all
            </span>
             </div>
             

            </button>
    </div>
 </div>



 <!--
    Add_Question_Container end div
 -->
 </div>

</div>


<div id="overlay"></div>


 <?php
        $All_Notifications = mysqli_query($connection , "SELECT * FROM notifications WHERE QA_Owner_id = $SessionUserId");
        $All_Notifications_Row = mysqli_num_rows($All_Notifications);
        
    ?>

<nav  id="navBar">

        <div class="rowflex" id="navbar_big_div">
  
            <div>
                <a class="brand" href="index.php?userID=<?php echo $_SESSION["userID"];?>" >
                IZÜ Social
                </a>  
            </div>

            <div class="rowflex ml-5 mr-4" id="Home_icon">
                <a class="nav-link" href="index.php?userID=<?php echo $_SESSION["userID"];?>">
                    <i class="fas fa-home font-adjust nav_icons_color" style="font-size:25px"></i>
                </a>
                <div class="hidden_titles" id="Home_title">
                    <div style="text-align: center;">
                    Home
                    </div>
                </div>
            </div>


            <div class="rowflex" id="Notifications_icon">
                <a class="nav-link" style="cursor:pointer">
                    <i class="fas fa-bell font-adjust nav_icons_color" style="font-size:25px"></i>
                </a>
                <div class="hidden_titles" id="Notifications_title" style="top:53">
                    <div style="text-align: center;" >
                    Notifications
                    </div>
                </div>
                    <div class="Notifications_icon_number_div">
                <?php if ($All_Notifications_Row>0){?>
                    <div class="Notifications_icon_number">
                        <?php echo $All_Notifications_Row; ?>
                    </div>
                <?php }?>
                    </div>
                    
            </div>
      
     


            <div class="rowflex ml-4 mr-4 "  id="Campus_icon">
                <a class="nav-link" href="https://kampus.izu.edu.tr/login" target="_blank">
                    <i class="fas fa-university font-adjust nav_icons_color " style="font-size:25px" ></i>
                </a>
                <div class="hidden_titles" id="Campus_title" >
                    <div style="text-align: center;">
                    Kampüs Bligi Sistemi
                    </div>
                </div>
            </div>

        

            <div class="SearchBarContainer  mr-4 rowflex">
                <div style="order:1;;width:10%;" class="icon_div rowflex">
                <span class="material-icons" name="search_botton" style="font-size:25;color:#999CA6s;">
                    search
                </span>
                </div>
                <div style="order:2;width:90%">
                <input type="text" id="search" placeholder="Search" name="search_input" data-id="<?php echo $SessionUserId;?>">
                </div>

                <div class="search_resaults" style="display:none">

                    <!-- data from ajax -->

                    <!-- search_resaults end -->
                </div>
                


                <!-- SearchBarContainer end -->
            </div>



            <div class="dropdown flex_row_start" id="Language_icon">
                <div class="hidden_titles" id="Language_title" style="top:55">
                    <div style="text-align: center;">
                    Language
                    </div>
                </div>
                <a class="nav-link" style="color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-globe font-adjust nav_icons_color rowflex" style="font-size:24px">
                <span style="font-size:13px;padding-left:5px;font-weight:normal">Eng</span></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width:60px">
                <a class="dropdown-item" href="#">
                    <div class="flex_row_start">
                        <div>Türkçe</div>
                        <div style="display:none">
                                    <span class="material-icons" style="color:#2E69FF;font-size:23;margin:0px 0px 0px 10px">
                                        done
                                    </span>
                        </div> 
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="flex_row_start">
                        <div>English</div>
                        <div>
                                    <span class="material-icons" style="color:#2E69FF;font-size:23;margin:0px 0px 0px 10px">
                                        done
                                    </span>
                        </div> 
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="flex_row_start">
                        <div>العربية</div>
                        <div style="display:none">
                                    <span class="material-icons" style="color:#2E69FF;font-size:23;margin:0px 0px 0px 10px">
                                        done
                                    </span>
                        </div> 
                    </div>
                </a>
                </div>
                
            </div>




                <div class="dropdown rowflex ml-3" style="width:auto"  id="Profile_icon">
                    <a style="cursor:pointer" data-toggle="dropdown" class="dropdown-toggle rowflex Black_Link"> 
                        <div class="smallPicDiv" alt="profile" title="Profile" 
                            style=";background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>);
                            width: 30;height: 30;margin-right:10px">
                        </div> <span style="color:#494D59;font-size:15px"><?php echo $_SESSION["Name"];?></span> 
                    </a>

                    <div class="hidden_titles" id="Profile_title" style="top:55">
                            <div style="text-align: center;">
                            Profile
                            </div>
                    </div>

                    
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="ProfileEditor.php?userID=<?php echo $_SESSION["userID"];?>">
                            <div class="flex_row_start">
                                <div class="rowflex">
                                    <i class="fas fa-user font-adjust" style="font-size:15px;color:#494D59"></i>
                                </div>
                                <div style="text-align: center;margin-left:10px">Profile</div>
                            </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://kampus.izu.edu.tr/login" target="_blank">Kampüs Bilgi Sistemi</a>
                            <a class="dropdown-item" href="login.php"><b style="color:#8B2232">Logout</b></a>
                        </ul>
        
                </div>

        </div>




        <div id="navbar_media_Div">

            <div class="flex_space" id="navbar_media_Div_header">

                <div style="order:1;padding: 10px;">
                    <a class="brand" href="index.php?userID=<?php echo $_SESSION["userID"];?>" >
                    IZÜ Social
                    </a>  
                </div>

                <div class="toggle_close_div" style="order:2;" id="toggle_button">
                        <i class="fas fa-bars font-adjust " style="font-size:25px;"></i>
                </div>

                <div class="toggle_close_div" style="order:2;" id="close_button">
                        <span class="material-icons " style="color:#2D3138;font-size:27px;cursor:pointer">
                            close
                        </span>
                </div>

            </div>

            <div  class="flex_column" style="order:2;;width:100%" id="icons_names_div">
                    <a href="index.php?userID=<?php echo $_SESSION["userID"];?>">
                <div class="divs_Hover">
                    Home
                </div>
                    </a>
                    <a >
                <div class="divs_Hover" id="Notifications_icon_media">
                   Notifications
                </div>
                    </a>
                    <a href="https://kampus.izu.edu.tr/login" target="_blank">
                <div class="divs_Hover">
                    Kampüs Bilgi Sistemi
                </div>
                    </a>
                <div>
                        <div class="input-group search-box">								
                            <input type="text" id="search" class="form-control" placeholder="Search">
                            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                        </div>
                </div>
                    <a href="ProfileEditor.php?userID=<?php echo $_SESSION["userID"];?>">
                <div class="divs_Hover">
                    Profile
                </div>
                    </a>
                    <a href="Login.php">
                <div class="divs_Hover">
                    Logout
                </div>
                    </a>
            </div>


        </div>


   

</nav>



<div class="fixed_ask_div rowflex  AskButton">

  <!-- <i class="fas fa-plus font-adjust"  style="font-size:25px;color:white"></i> -->
  <span class="material-icons" style="font-size:30px;color:white">
    add
  </span>


</div>


<div class="fixed_notifications_div" >

    <div class="notifications_div">

    

        <div class="All_notifications_div">

        <?php

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


            <!-- All_notifications_div end -->

        </div>


        <div class="flex_row_start notifications_div_bottom">
            <div class="rowflex" id="Mark_all_as_read" data-id="<?php echo $SessionUserId;?>">
                    Mark all as read
            </div>

            <div class="rowflex" id="Clear_all_notification" data-id="<?php echo $SessionUserId;?>">
                    Clear
            </div>
                
        </div>
        

        <!-- notifications_div end -->
    </div>

    <!-- fixed_notifications_div end -->
</div>


<div class="fixed_alert_div" style="display:none">

    <div class="alert_div rowflex">
        <div>
            <span class="material-icons" style="color:white;font-size:25;margin:0px 10px 0px 0px">
                done
            </span>
        </div>
        <div id="alert_message_content" style="color:white">
            <!-- Question Added -->
        </div>
    </div>

</div>




<div id="QuestionPageView">


<div id="QuestionPage_left_side">


<div id="Question">

    <?php
    $questionid=$_GET["QuestionID"];
    $select_question=mysqli_query($connection,"SELECT * FROM questions WHERE QuestionID=$questionid");
    $AllQuestions = mysqli_fetch_array($select_question);
    $question=$AllQuestions["Question"];
    $userid=$AllQuestions["UserID"];
    $select_user=mysqli_query($connection,"SELECT * FROM users WHERE UserID=$userid");
    $userinfo = mysqli_fetch_array($select_user);
    //answers number
    $select=mysqli_query($connection,"SELECT * FROM `answers` WHERE Parent_Answer_ID IS NULL AND QuestionID=$questionid ORDER BY Votes DESC");
     @$Answers_number = mysqli_num_rows($select);
    ?>


    <div class="QuestionPage_Containers" style="margin-top:0px">

        <div class="QuestionPage_Containers_header" style="padding:0px 5px 0px 5px;">
                <?php
                    if ( $userinfo["UserID"]==$_SESSION["userID"]) {
                        $Profile_link="ProfileEditor.php?userID=" . $_SESSION["userID"];
                    }
                    else{
                        $Profile_link="Profile.php?userID=" . $_SESSION["userID"] . "&guestID=" . $userinfo["UserID"];
                    }
                ?>

             <div style="order:1" class="rowflex">

                    <a href="<?php echo $Profile_link;?>" class="Black_Link" style="color:#8b2232 ">
                <div class="smallPicDiv" style="order: 1;width:25;height:25;
                margin-right:10px;background-image: url(user_images/<?php echo $userinfo["Profile_Picture"];?>)"></div>
                     </a>
            
                <div style="order: 2;font-size:14px">
                 Asked By
                        <a href="<?php echo $Profile_link;?>" class="Black_Link" style="color:#8b2232 ">
                        <?php
                            echo $userinfo["Name"];
                        ?>
                        </a>
                </div>
          </div>

            <div style="order:2">
                    <div class="btn-group dropleft">
                            <button type="button" class="question_ozel_btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h font-adjust" style="font-size:20px;color:#2D3138"></i>
                            </button>
                            <div class="dropdown-menu" id="my_main_dropdown">
                                <a class="dropdown-item my_main_item" style="cursor:pointer">remove</a>
                                <a class="dropdown-item my_main_item copyLink_icon" style="cursor:pointer"
                                data-id="http://localhost/PROJEM/QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>"
                                >copy link</a>
                            </div>
                            
                    </div>


            </div>

        </div>


        <div style="padding:10px 20px 10px 20px;font-size: 25px;order: 2;word-wrap: break-word;">
            <?php echo $AllQuestions["Question"];?>
        </div>


        <?php
        
        if($AllQuestions["Question_type"] == 2){
        ?>

    <div class="HomePage_Options"  style="order:3;width:92%;margin:0px 20px 20px 20px;">

        <?php 
        $GetOptions = mysqli_query($connection , "SELECT * FROM questions WHERE QuestionID = $questionid");
        $OptionsCount = mysqli_num_rows($GetOptions);
        $Options = mysqli_fetch_assoc($GetOptions);
        $AllAnswers = mysqli_query($connection , "SELECT * FROM recorded_information WHERE QuestionID = $questionid");
        @$AllAnswersRow = mysqli_num_rows($AllAnswers);
        $number=0;

        for($i = 1 ; $i<6;$i++){
        if($Options["Option$i"] != ""){
            $Option=$Options["Option$i"];
            $number=$number+1;

            $SelectedOption = mysqli_query($connection , "SELECT * FROM recorded_information WHERE Optional_Answer= '$Option' AND QuestionID = $questionid");
        @$optionRow = mysqli_num_rows($SelectedOption);
        
        @$optionselect = ($optionRow / $AllAnswersRow ) * 100;
        @$optionselect = number_format($optionselect,2);

        $Optional_AnswerControl = mysqli_query($connection , "SELECT * FROM recorded_information WHERE QuestionID = $questionid AND UserID = $SessionUserId AND Optional_Answer IS NOT NULL");
        $Optional_AnswerRowControl = mysqli_num_rows($Optional_AnswerControl);



        if(!($Optional_AnswerRowControl > 0)){
        ?>
       
        <div class="flexrow check_uncheck_div selected_option" style="order:1;margin-bottom:5px" data-id="<?php echo $questionid;?>">


            <div style="order:1;margin-top:3px" class="unchecked_button unchecked_button_<?php echo $questionid; ?>" >
            <span class="material-icons check_unchecked_class" style="color:black">
                radio_button_unchecked
            </span>
            </div>

            <div style="order:1;margin-top:3px;" class="checked_button checked_button_<?php echo $questionid; ?>" >
            <span class="material-icons check_unchecked_class" style="color:#1167B1">
                radio_button_checked
            </span>
            </div>

            <div style="order:2;padding:5px 10px 5px 10px" id="option" data-id="<?php echo $SessionUserId;?>">
            <?php echo $Options["Option$i"]; ?>
            </div>

        </div>
        <?php
            }
        
            else{
        ?>

        <div class="flexrow check_uncheck_div selected_option" style="order:1;margin-bottom:5px" data-id="<?php echo $questionid;?>">
            
            <div style="order:2;padding:5px 10px 5px 10px;" id="option" data-id="<?php echo $SessionUserId;?>">
            <?php echo $Options["Option$i"]; ?>
            </div>

        </div>

        <div class="flexRow poll_results_Div" style="order:3" >
        

        <div style="order:1;margin-bottom:-.5px;">
            <?php
            $SelectedOptional_Answer = mysqli_fetch_assoc($Optional_AnswerControl);
            
                if ($Options["Correct_Option"]=="") {
            if($SelectedOptional_Answer["Optional_Answer"] == $Options["Option$i"]){
            ?>

            <div style="order:1;backgorund-color:red" class="selected_option_icon">
                <span class="material-icons-outlined" style="color:#1167B1;font-size:20px;"> 
                check_circle
                </span>
            </div> 

            <?php } } else{?>




        <?php if ($SelectedOptional_Answer["Optional_Answer"] == $Options["Option$i"] and $SelectedOptional_Answer["Optional_Answer"] ==$Options["Correct_Option"]
        or $Options["Option$i"]==$Options["Correct_Option"] ){?>
            <div style="order:1" class="correct_option_icon">
                <span class="material-icons-outlined" style="color:#48A868;font-size:20px;"> 
                check_circle
                </span>
            </div>

            <?php } else { ?>

            <div style="order:1" class="false_option_icon">
                <span class="material-icons-outlined" style="color:#DE535E;font-size:20px;"> 
                highlight_off
                </span>
            </div>
            <?php } ?>

    
        <?php }?>
        </div>  





            <div style="order:2;width:<?php echo $optionselect;?>%" class="bar" id="bar_<?php echo $questionid; ?>">
                <?php
                    if ($Options["Correct_Option"]=="") {
                ?>
            <div class="blue_percentage_bar"></div>
            
                <?php  } else{?>               

            <?php if ($SelectedOptional_Answer["Optional_Answer"] == $Options["Option$i"] and $SelectedOptional_Answer["Optional_Answer"] ==$Options["Correct_Option"]
            or $Options["Option$i"]==$Options["Correct_Option"]){?>

            <div class="green_percentage_bar"></div>

            <?php } else if($SelectedOptional_Answer["Optional_Answer"] == $Options["Option$i"] and $SelectedOptional_Answer["Optional_Answer"] !=$Options["Correct_Option"]
            or $Options["Option$i"]!=$Options["Correct_Option"]){ ?>

            <div class="red_percentage_bar"></div>
            <?php }?>

                <?php }?>
            </div>


            <div style="order:3;font-size:15px;margin-top:-2px;font-style: italic">
                <?php
                echo $optionselect. '%';
                ?>
            </div>

        <!-- 
        poll_results_Div end div
        -->
        </div>

     <?php }  ?>


        <div class="flexRow poll_results_Div" style="order:3;display:none" id="poll_results_Div_<?php echo $number;?>_<?php echo $questionid; ?>">


            <div style="order:1;margin-bottom:-.5px;" >

                    <div style="order:1;display:none" class="selected_option_icon">
                        <span class="material-icons-outlined" style="color:#1167B1;font-size:20px;"> 
                        check_circle
                        </span>
                    </div> 


                    <div style="order:1;display:none" class="correct_option_icon">
                        <span class="material-icons-outlined" style="color:#48A868;font-size:20px;"> 
                        check_circle
                        </span>
                    </div>


                    <div style="order:1;display:none" class="false_option_icon">
                        <span class="material-icons-outlined" style="color:#DE535E;font-size:20px;"> 
                        highlight_off
                        </span>
                    </div>

            </div>  


            <div style="order:2;width:0%" class="bar" id="bar_<?php echo $number;?>_<?php echo $questionid; ?>">

                    <div style="display:none" class="blue_percentage_bar"></div>

                    <div style="display:none" class="green_percentage_bar"></div>

                    <div style="display:none" class="red_percentage_bar"></div>
                    
            </div>


            <div style="order:3;font-size:15px;margin-top:-2px;font-style: italic" 
            class="percents_div" id="bar_percent_<?php echo $number;?>_<?php echo $questionid;?>">
                    
                        <!-- <span class="material-icons" tyle="font-size:23;color:#d6d6d6;">
                            person_off
                        </span>  -->
                        <!-- <i class="fas fa-user-alt-slash font-adjust" style="font-size:17px;color:#d6d6d6"></i> -->
                        <!-- <i class="fas fa-user-times font-adjust" style="font-size:18px;color:#d6d6d6"></i> -->
            </div>

            <!-- 
            poll_results_Div end div
            -->
        </div>


        <?php  }} ?>
        <!-- 
        HomePage_Options end div
        -->
    </div>



        <?php
        }
        else if($AllQuestions["Question_type"] == 3){
        ?>

    <div style="order: 3;margin-top:10px" class="Yes_No_big_Container">

         <?php
           $Get_Question_row = mysqli_query($connection , "SELECT * FROM questions WHERE QuestionID = $questionid");
           $YesNo_array = mysqli_fetch_assoc($Get_Question_row);

           $Yes_No_AllAnswers = mysqli_query($connection , "SELECT * FROM recorded_information 
           WHERE QuestionID = $questionid AND UserID = $SessionUserId AND (Yes=1 OR No=1)");
           
           @$Yes_No_AllAnswersRow = mysqli_num_rows($Yes_No_AllAnswers);

           @$YesCount=  $YesNo_array["Yes"];
           @$NoCount =  $YesNo_array["No"];
           @$Resault = $YesCount + $NoCount;

           @$YesResault = ($YesCount/$Resault)*100;
           @$YesResault = number_format($YesResault,2);
           @$NoResault = ($NoCount/$Resault)*100;
           @$NoResault = number_format($NoResault,2);


         ?>
 

        <div style="order: 1;" class="columnflex" id="yes_div"  data-id="<?php echo $SessionUserId;?>">
            <div style="order: 1;color:#58C77D;width:100%" class="scale_motion yesNo_font Yes_button" data-id="<?php echo $questionid;?>" >
                YES
            </div>
            <div style="order: 2;width:100%" class="yes_Bar" id="yes_Bar_<?php echo $questionid;?>">
                <div style="width:0" class="Yes_green_bar " id="Yes_green_bar_<?php echo $questionid;?>"></div>
                <?php if($Yes_No_AllAnswersRow > 0){ ?>
                <div style="width:<?php echo $YesResault; ?>%" class="Yes_green_bar"></div>
                <?php }?>
                
            </div>
            <div style="display:none;order: 3;font-size:15px;color:#999CA6;font-style: italic;width:100%" id="Yes_Resault_number_<?php echo $questionid;?>">
            </div>
            <?php if($Yes_No_AllAnswersRow > 0){ ?>
            <div style="order: 3;font-size:15px;color:#999CA6;font-style: italic;;width:100%" class="Resault_number">
                    <?php echo $YesResault . '%'; ?>
            </div>
            <?php }?>
            



        <!-- yes_div end div  -->
        </div>





        <div style="order: 2" class="columnflex" id="No_div" data-id="<?php echo $SessionUserId;?>">
                <div style="order: 1;color:#DE535E;width:100%"  class="scale_motion yesNo_font No_button" data-id="<?php echo $questionid;?>" >
                    NO
                </div>
                <div style="order: 2;width:100%" class="No_Bar" id="No_Bar_<?php echo $questionid;?>">
                    <div style="width:0" class="No_red_bar"  id="No_red_bar_<?php echo $questionid;?>"></div>
                    <?php if($Yes_No_AllAnswersRow > 0){ ?>
                    <div style="width:<?php echo $NoResault; ?>%" class="No_red_bar"></div>
                    <?php }?>
                </div>
                <div style="display:none;order: 3;font-size:15px;color:#999CA6;font-style: italic;width:100%"  id="No_Resault_number_<?php echo $questionid;?>">
                </div>
                <?php if($Yes_No_AllAnswersRow > 0){ ?>
                <div style="order: 3;font-size:15px;color:#999CA6;font-style: italic;width:100%">
                    <?php echo $NoResault . '%'; ?>
                </div>
                <?php }?>
                


                <!-- No_div end div  -->

        </div>


     
        <!-- Yes_No_big_Container end div  -->
    </div>


        <?php
            }
        ?>



        <div style="order:5;font-size: 10px;color:#2D3138;padding-left:20px" class="rowflex">
            <div>
                <?php
                    echo $AllQuestions["Question_Date"];
                ?>
            </div>
            <div style="margin-left:10px">
                    <?php
                    echo $Answers_number;
                    ?>
                    Answer
            </div>
                    
        </div>

        

        
      
    </div>
            


</div>


<div id="Yorumlar">
    <?php
 $select_Answer=mysqli_query($connection,"SELECT * FROM `answers` WHERE Parent_Answer_ID IS NULL AND QuestionID=$questionid ORDER BY Votes DESC");
 while($AllAnswers = mysqli_fetch_assoc($select_Answer)){
 $userid=$AllAnswers["UserID"];
 $answerid=$AllAnswers["AnswerID"];
  $select_user=mysqli_query($connection,"SELECT * FROM users WHERE UserID=$userid");
  while($userinfo = mysqli_fetch_assoc($select_user)){
    ?>




   
 <div class="QuestionPage_Containers" >

    <div style="order: 1" class="QuestionPage_Containers_header">

     <div class="rowflex" style="order: 1">
                <?php
                    if ( $userinfo["UserID"]==$_SESSION["userID"]) {
                        $Profile_link="ProfileEditor.php?userID=" . $_SESSION["userID"];
                    }
                    else{
                        $Profile_link="Profile.php?userID=" . $_SESSION["userID"] . "&guestID=" . $userinfo["UserID"];
                    }
                ?>

            <a href="<?php echo $Profile_link;?>" class="Black_Link">
         <div class="smallPicDiv" style="order: 1;margin-right:10px;background-image: url(user_images/<?php echo $userinfo["Profile_Picture"];?>)"></div>
            </a>
         <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start;font-size:15px">

         <div>
              <a href="<?php echo $Profile_link;?>" class="Black_Link">
             <?php
                echo $userinfo["Name"];
             ?>
            </a>
         </div>

          <div style="font-size: 10px;color:rgb(139, 138, 138)">
           <?php
          echo $AllAnswers["Answer_Date"];

        }
           ?>
          </div>
        </div>
      </div>
      
      <div style="order: 2">
         <div>
              <span class="material-icons Answer_Add_reply_icon" style="font-size:28;cursor: pointer" 
              id="Answer_Add_reply_icon_<?php echo $AllAnswers["AnswerID"];?>" data-id="<?php echo $AllAnswers["AnswerID"]; ?>">
                       reply
            </span>
        </div>
      </div>
      
    </div>

       <div style="order: 2;padding:20px 20px 10px 20px;font-size: 17px;word-wrap: break-word;" id="<?php echo $AllAnswers["AnswerID"]; ?>">
        <?php echo $AllAnswers["Answer"];?>
       </div>

    
        <div class="QuestionPage_Containers_footer" style="order: 3">
            <ul>

                <li style="order: 1;margin-left: 10px;">
                    <div style="display: inline-block;margin-right: 15px;text-align: center;">
                    <?php
                    $Select_info=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerid AND Voted=1 AND UserID=$SessionUserId");
                    $votedControl= mysqli_num_rows($Select_info);
                    if ($votedControl==1) {
                    ?>
                    <span class="material-icons Like" style="font-size: 27;cursor: pointer;display:none;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>

                        <span class="material-icons Un_Like" style="font-size: 27;cursor: pointer;color:#8B2232;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>
                    <?php }  else{ ?>
                         <span class="material-icons Like" style="font-size: 27;cursor: pointer;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>

                        <span class="material-icons Un_Like" style="font-size: 27;cursor: pointer;color:#8B2232;display:none;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>
                    <?php } ?>

                        <h6 style="margin-top: 5px;font-weight: normal;" id="allVotes">
                        <?php
                        echo $AllAnswers["Votes"];
                        ?>
                        </h6>
                    </div>

                    <div style="display: inline-block;text-align: center;">
                    <?php
                    $info_Select=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerid AND UnVoted=1 AND UserID=$SessionUserId");
                    $UnvotedControl= mysqli_num_rows($info_Select);
                    if ($UnvotedControl==1) {
                    ?>
                        <span class="material-icons Dislike" style="font-size: 25;cursor: pointer;display:none" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 25;cursor: pointer;color:#8B2232;"
                         data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                               thumb_down
                        </span>
                    <?php }  else{ ?>
                         <span class="material-icons Dislike" style="font-size: 25;cursor: pointer;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 25;cursor: pointer;color:#8B2232;display:none"
                         data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                               thumb_down
                        </span>
                    <?php } ?> 

                        <h6 style="margin-top: 5px;font-weight: normal;" id="allUnVotes">
                         <?php
                        echo $AllAnswers["UnVotes"];
                        ?>
                        </h6>
                    </div>
                </li>
                <?php
                if ($_SESSION["userID"]==$userid) {
                 ?>
                <li style="order:2">

                    <div id="X_<?php echo  $AllAnswers["AnswerID"];?>"  data-id="<?php echo $AllAnswers["AnswerID"]; ?>">
                      <span class="material-icons Answers_X_icon" style="color:#2D3138;font-size:22;cursor:pointer;">
                      close
                      </span>
                    </div>

                    <div class="rowflex" style="display:none" id="Answer_remove_div_<?php echo  $AllAnswers["AnswerID"];?>">
                        <div class="Bottom_delete_div Remove_Answer" style="margin-right:15px" data-id="<?php echo $AllAnswers["AnswerID"]; ?>">
                            <h6>remove</h6>
                        </div>
                        <div class="Bottom_delete_div dont_Remove_Answer"  data-id="<?php echo $AllAnswers["AnswerID"]; ?>">
                            <h6>cancel</h6>
                        </div>
                    </div>
                    
                </li>
                <?php
                 }
                 ?>
            </ul>

        </div>

        <?php
        $Answers_query=mysqli_query($connection,"SELECT * FROM `answers` WHERE Parent_Answer_ID=$answerid AND QuestionID=$questionid");
        while($All_related_Answers = mysqli_fetch_assoc($Answers_query)){
        $userID=$All_related_Answers["UserID"];
        $answerID=$All_related_Answers["AnswerID"];
        $user_query=mysqli_query($connection,"SELECT * FROM users WHERE UserID=$userID");
        while($answer_userinfo = mysqli_fetch_assoc($user_query)){
        ?>

        
        <div class="AnswerWithParent_div" style="order: 4">

             <div style="order: 1" class="QuestionPage_Containers_header">

     <div class="rowflex" style="order: 1">
                <?php
                    if ( $answer_userinfo["UserID"]==$_SESSION["userID"]) {
                        $Profile_link="ProfileEditor.php?userID=" . $_SESSION["userID"];
                    }
                    else{
                        $Profile_link="Profile.php?userID=" . $_SESSION["userID"] . "&guestID=" . $answer_userinfo["UserID"];
                    }
                ?>
            <a href="<?php echo $Profile_link;?>?>" class="Black_Link">
         <div class="smallPicDiv" style="order: 1;width:35;height:35;margin-right:10px;
         background-image: url(user_images/<?php echo $answer_userinfo["Profile_Picture"];?>)"></div>
            </a>

        <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start;font-size:14px">
         <div>
                <a href="<?php echo $Profile_link;?>?>" class="Black_Link">
             <?php
                echo $answer_userinfo["Name"];
             ?>
            </a>
         </div>

          <div style="font-size: 10px;color:rgb(139, 138, 138)">
           <?php
          echo $All_related_Answers["Answer_Date"];

        }
           ?>
          </div>
        </div>
      </div>
      
      <div style="order: 2">
         <div>
              <span class="material-icons Answer_Add_reply_icon" style="font-size:25;cursor: pointer" 
              id="Answer_Add_reply_icon_<?php echo $All_related_Answers["AnswerID"];?>" data-id="<?php echo $All_related_Answers["AnswerID"]; ?>">
                       reply
            </span>
        </div>
      </div>
      
    </div>

       <div style="order: 2;padding:20px 20px 10px 20px;font-size: 16px;word-wrap: break-word;" id="<?php echo $All_related_Answers["AnswerID"]; ?>">
        <?php echo $All_related_Answers["Answer"];?>
       </div>

    
        <div class="QuestionPage_Containers_footer" style="order: 3">
            <ul>

                <li style="order: 1;margin-left: 10px;">
                    <div style="display: inline-block;margin-right: 15px;text-align: center;">
                    <?php
                    $Select_info=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerID AND Voted=1 AND UserID=$SessionUserId");
                    $votedControl= mysqli_num_rows($Select_info);
                    if ($votedControl==1) {
                    ?>
                    <span class="material-icons Like" style="font-size: 25;cursor: pointer;display:none;" data-id="<?php echo $All_related_Answers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>

                        <span class="material-icons Un_Like" style="font-size: 25;cursor: pointer;color:#8B2232;" data-id="<?php echo $All_related_Answers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>
                    <?php }  else{ ?>
                         <span class="material-icons Like" style="font-size: 25;cursor: pointer;" data-id="<?php echo $All_related_Answers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>

                        <span class="material-icons Un_Like" style="font-size: 25;cursor: pointer;color:#8B2232;display:none;" data-id="<?php echo $All_related_Answers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>
                    <?php } ?>

                        <h6 style="margin-top: 5px;font-weight: normal;font-size:15px" id="allVotes">
                        <?php
                        echo $All_related_Answers["Votes"];
                        ?>
                        </h6>
                    </div>

                    <div style="display: inline-block;text-align: center;">
                    <?php
                    $info_Select=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerID AND UnVoted=1 AND UserID=$SessionUserId");
                    $UnvotedControl= mysqli_num_rows($info_Select);
                    if ($UnvotedControl==1) {
                    ?>
                        <span class="material-icons Dislike" style="font-size: 23;cursor: pointer;display:none" data-id="<?php echo $All_related_Answers['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 23;cursor: pointer;color:#8B2232;"
                         data-id="<?php echo $All_related_Answers['AnswerID']; ?>">
                               thumb_down
                        </span>
                    <?php }  else{ ?>
                         <span class="material-icons Dislike" style="font-size: 23;cursor: pointer;" data-id="<?php echo $All_related_Answers['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 23;cursor: pointer;color:#8B2232;display:none"
                         data-id="<?php echo $All_related_Answers['AnswerID']; ?>">
                               thumb_down
                        </span>
                    <?php } ?> 

                        <h5 style="margin-top: 5px;font-weight: normal;font-size:15px" id="allUnVotes">
                         <?php
                        echo $All_related_Answers["UnVotes"];
                        ?>
                        </h5>
                    </div>
                </li>
                <?php
                if ($_SESSION["userID"]==$userID) {
                 ?>
                <li style="order:2">

                    <div id="X_<?php echo  $All_related_Answers["AnswerID"];?>"  data-id="<?php echo $All_related_Answers["AnswerID"]; ?>">
                      <span class="material-icons Answers_X_icon" style="color:#2D3138;font-size:22;cursor:pointer;">
                      close
                      </span>
                    </div>

                    <div class="rowflex" style="display:none" id="Answer_remove_div_<?php echo  $All_related_Answers["AnswerID"];?>">
                        <div class="Bottom_delete_div Remove_Answer" style="margin-right:15px" data-id="<?php echo $All_related_Answers["AnswerID"]; ?>">
                            <h6>remove</h6>
                        </div>
                        <div class="Bottom_delete_div dont_Remove_Answer"  data-id="<?php echo $All_related_Answers["AnswerID"]; ?>">
                            <h6>cancel</h6>
                        </div>
                    </div>

                </li>
                <?php
                 }
                 ?>
            </ul>

        </div>

    <div style="order:5;display:none" class="QuestionPage_Related_Reply" id="ReplyFor_<?php echo  $All_related_Answers["AnswerID"];?>">

         <div class="smallPicDiv" 
         style="width:10%;;order: 1;margin-right:10px;width:32;height:32;
         background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
    
        <div class="QuestionPage_Text_Area_Div" >
           <textarea  id="Comment_<?php echo $All_related_Answers["AnswerID"]; ?>" class="QuestionPage_reply_input"
            placeholder="Add Comment" maxlength="300" required
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
        </div>


        <div style="order: 3;width:9%" class="rowflex" data-id="<?php echo $questionid; ?>">
         <span class="material-icons Add_reply_for_Answer" style="font-size: 35;cursor: pointer;color:#8B2232" data-id="<?php echo $All_related_Answers["AnswerID"]; ?>">
                         add
         </span>
        </div>

    </div>


        <?php
        $Answers_query2=mysqli_query($connection,"SELECT * FROM `answers` WHERE Parent_Answer_ID=$answerID AND QuestionID=$questionid");
        while($All_related_Answers2 = mysqli_fetch_assoc($Answers_query2)){
        $userID2=$All_related_Answers2["UserID"];
        $answerID2=$All_related_Answers2["AnswerID"];
        $user_query2=mysqli_query($connection,"SELECT * FROM users WHERE UserID=$userID2");
        while($answer_userinfo2 = mysqli_fetch_assoc($user_query2)){
        ?>

         <div class="AnswerWithParent_div" style="order: 4;">



          <div style="order: 1" class="QuestionPage_Containers_header">

     <div class="rowflex" style="order: 1">
                <?php
                    if ( $answer_userinfo2["UserID"]==$_SESSION["userID"]) {
                        $Profile_link="ProfileEditor.php?userID=" . $_SESSION["userID"];
                    }
                    else{
                        $Profile_link="Profile.php?userID=" . $_SESSION["userID"] . "&guestID=" . $answer_userinfo2["UserID"];
                    }
                ?>
            <a href="<?php echo $Profile_link;?>" class="Black_Link">
         <div class="smallPicDiv" style="order: 1;width:32;height:32;margin-right:10px;
         background-image: url(user_images/<?php echo $answer_userinfo2["Profile_Picture"];?>)"></div>
            </a>

        <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start;font-size:13px">
            <div>
                <a href="<?php echo $Profile_link;?>" class="Black_Link">
                    <?php
                        echo $answer_userinfo2["Name"];
                    ?>
                </a>
            </div>

          <div style="font-size: 10px;color:rgb(139, 138, 138)">
           <?php
          echo $All_related_Answers2["Answer_Date"];

        }
           ?>
          </div>
        </div>
      </div>
      
       <div style="order: 2">
         <div>
              <span class="material-icons Answer_Add_reply_icon" style="font-size:23;cursor: pointer" 
              id="Answer_Add_reply_icon_<?php echo $All_related_Answers2["AnswerID"];?>" data-id="<?php echo $All_related_Answers["AnswerID"]; ?>">
                       reply
            </span>
        </div>
      </div> 
      
    </div>

       <div style="order: 2;padding:20px 20px 10px 20px;font-size: 15px;word-wrap: break-word;" id="<?php echo $All_related_Answers2["AnswerID"]; ?>">
        <?php echo $All_related_Answers2["Answer"];?>
       </div>

    
        <div class="QuestionPage_Containers_footer" style="order: 3">
            <ul>

                <li style="order: 1;margin-left: 10px;">
                    <div style="display: inline-block;margin-right: 15px;text-align: center;">
                    <?php
                    $Select_info=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerID2 AND Voted=1 AND UserID=$SessionUserId");
                    $votedControl= mysqli_num_rows($Select_info);
                    if ($votedControl==1) {
                    ?>
                    <span class="material-icons Like" style="font-size: 23;cursor: pointer;display:none;" data-id="<?php echo $All_related_Answers2['AnswerID']; ?>">
                           thumb_up_alt
                        </span>

                        <span class="material-icons Un_Like" style="font-size: 23;cursor: pointer;color:#8B2232;" data-id="<?php echo $All_related_Answers2['AnswerID']; ?>">
                           thumb_up_alt
                        </span>
                    <?php }  else{ ?>
                         <span class="material-icons Like" style="font-size: 23;cursor: pointer;" data-id="<?php echo $All_related_Answers2['AnswerID']; ?>">
                           thumb_up_alt
                        </span>

                        <span class="material-icons Un_Like" style="font-size: 23;cursor: pointer;color:#8B2232;display:none;" data-id="<?php echo $All_related_Answers2['AnswerID']; ?>">
                           thumb_up_alt
                        </span>
                    <?php } ?>

                        <h6 style="margin-top: 5px;font-weight: normal;;font-size:13px" id="allVotes">
                        <?php
                        echo $All_related_Answers2["Votes"];
                        ?>
                        </h6>
                    </div>

                    <div style="display: inline-block;text-align: center;">
                    <?php
                    $info_Select=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerID2 AND UnVoted=1 AND UserID=$SessionUserId");
                    $UnvotedControl= mysqli_num_rows($info_Select);
                    if ($UnvotedControl==1) {
                    ?>
                        <span class="material-icons Dislike" style="font-size: 21;cursor: pointer;display:none" data-id="<?php echo $All_related_Answers2['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 21;cursor: pointer;color:#8B2232;"
                         data-id="<?php echo $All_related_Answers2['AnswerID']; ?>">
                               thumb_down
                        </span>
                    <?php }  else{ ?>
                         <span class="material-icons Dislike" style="font-size: 21;cursor: pointer;" data-id="<?php echo $All_related_Answers2['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 21;cursor: pointer;color:#8B2232;display:none"
                         data-id="<?php echo $All_related_Answers2['AnswerID']; ?>">
                               thumb_down
                        </span>
                    <?php } ?> 

                        <h6 style="margin-top: 5px;font-weight: normal;;font-size:13px" id="allUnVotes">
                         <?php
                        echo $All_related_Answers2["UnVotes"];
                        ?>
                        </h6>
                    </div>
                </li>
                <?php
                if ($_SESSION["userID"]==$userID2) {
                 ?>
                <li style="order:2">

                    <div id="X_<?php echo  $All_related_Answers2["AnswerID"];?>"  data-id="<?php echo $All_related_Answers2["AnswerID"]; ?>">
                      <span class="material-icons Answers_X_icon" style="color:#2D3138;font-size:20;cursor:pointer;">
                      close
                      </span>
                    </div>

                    <div class="rowflex" style="display:none" id="Answer_remove_div_<?php echo  $All_related_Answers2["AnswerID"];?>">
                        <div class="Bottom_delete_div Remove_Answer" style="margin-right:15px" data-id="<?php echo $All_related_Answers2["AnswerID"]; ?>">
                            <h6>remove</h6>
                        </div>
                        <div class="Bottom_delete_div dont_Remove_Answer"  data-id="<?php echo $All_related_Answers2["AnswerID"]; ?>">
                            <h6>cancel</h6>
                        </div>
                    </div>


                </li>
                <?php
                 }
                 ?>
            </ul>

        </div>

    <div style="order:5;display:none" class="QuestionPage_Related_Reply" id="ReplyFor_<?php echo  $All_related_Answers2["AnswerID"];?>">

         <div class="smallPicDiv" 
         style="width:10%;;order: 1;margin-right:10px;width:32;height:32;
         background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
    
        <div class="QuestionPage_Text_Area_Div" >
           <textarea id="Comment_<?php echo $All_related_Answers2["AnswerID"]; ?>" class="QuestionPage_reply_input"
            placeholder="Add Comment" maxlength="300" required
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
        </div>


        <div style="order: 3;width:9%" class="rowflex" data-id="<?php echo $questionid; ?>">
         <span class="material-icons Add_reply_for_Answer" style="font-size: 35;cursor: pointer;color:#8B2232" data-id="<?php echo $All_related_Answers["AnswerID"]; ?>">
                         add
         </span>
        </div>

    </div>

    
    <div class="Comment_Error_Div" id="Comment_Error_Div_<?php echo $All_related_Answers2["AnswerID"]; ?>" style="display:none">

      <div style="display:inline;margin-right:5px">
         <span class="material-icons" style="font-size: 35;cursor: pointer;color:white">
             error
         </span>
      </div>

      <div style="display:inline;font-size:15px;color:white">
         Your comment cannot be blank.
      </div>


    </div>






        <!--
        AnswerWithparent end div
       -->
        </div>
        <?php
        }
        ?>
         



        <!--
        AnswerWithparent end div
       -->
        </div>
        <?php
        }
        ?>





    
 </div>






    <div style="order:5;display:none" class="QuestionPage_Reply" id="ReplyFor_<?php echo  $AllAnswers["AnswerID"];?>">

     <div class="smallPicDiv" 
     style="width:10%;;order: 1;margin-right:10px;width:40;height:40;
     background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
    
        <div class="QuestionPage_Text_Area_Div" >
           <textarea id="Comment_<?php echo $AllAnswers["AnswerID"]; ?>" class="QuestionPage_reply_input"
            placeholder="Add Comment" maxlength="300" required
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
        </div>


     <div style="order: 3;width:9%" class="rowflex" data-id="<?php echo $questionid; ?>">
        <span class="material-icons Add_reply_for_Answer" style="font-size: 40;cursor: pointer;color:#8B2232" data-id="<?php echo $AllAnswers["AnswerID"]; ?>">
                         add
        </span>
     </div>

    </div>

    
    <div class="Comment_Error_Div" id="Comment_Error_Div_<?php echo $AllAnswers["AnswerID"]; ?>" style="display:none">

      <div style="display:inline;margin-right:5px">
         <span class="material-icons" style="font-size: 35;cursor: pointer;color:white">
             error
         </span>
      </div>

      <div style="display:inline;font-size:15px;color:white">
         Your comment cannot be blank.
      </div>


    </div>
 

 

 <?php
 }
 ?>


 <!--
    yorumlar end div
 -->
</div>



 <div class="QuestionPage_MyReply_Container" id="Reply_ID">

    <div class="smallPicDiv" 
     style="width:10%;order: 1;margin-right:10px;width:45;height:45;
     background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
    
        <!-- <input id="Comment" type="text" class="QuestionPage_MyReply_input" placeholder="Add Comment" required style="order: 2;"> -->

        <div class="QuestionPage_Text_Area_Div">
           <textarea id="Comment" class="QuestionPage_reply_input"
            placeholder="Add Comment" maxlength="300" required
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
        </div>

     <div style="order: 3;display:flex;flex-direction: row;align-items:center;justify-content: center;width:9%;">
        <span class="material-icons QuestionPage_Add_reply" style="font-size: 45;cursor: pointer;color:#8B2232 " data-id="<?php echo $AllQuestions["QuestionID"]; ?>">
                         add
        </span>
     </div>

 </div>



    <div class="Comment_Error_Div" id="MyComment_Error_Div" style="display:none">

      <div style="display:inline;margin-right:5px;text-align:center">
         <span class="material-icons" style="font-size: 27;cursor: pointer;color:white">
             error
         </span>
      </div>

      <div style="display:inline;font-size:15px;color:white">
         Your comment cannot be blank.
      </div>


    </div>



<!--
    QuestionPage_left_side end div
-->
</div>


<div id="QuestionPage_right_side">

 <div class="related_Questions_div" >

    <div style="align-self:center;color:#8b2232;font-weight:bolder;">
 <h6 >
    Related Questions
 </h6>
    </div>

 <?php
 $control=0;
 $select_q=mysqli_query($connection,"SELECT * FROM questions");
 while($RelatedQuestions = mysqli_fetch_array($select_q)){
    similar_text($question,$RelatedQuestions["Question"],$deger);
    
    if($deger > 40 && $deger != 100){
 ?>
 <div style="margin:8 10px 8px 10px;font-size: 15px;word-wrap: break-word;font-weight: 600;">
     <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo $RelatedQuestions["QuestionID"];?>" class="QuestionPreviewLink">
         <?php
        echo $RelatedQuestions["Question"];
          ?>
          </a>
 </div>
 <?php
 $control=1;
 }
//  while end
 }


 if($control!=1 || $control==0){
 ?>
 <div style="margin:5px;font-size: 15px;word-wrap: break-word;" class=rowflex>
        <span class="material-icons" style="font-size:25;margin-right:10px;color:#4B536E">
         sentiment_very_dissatisfied
        </span>
        <div style="margin:10px;font-size: 15px;">
            No questions found similar to this question  
        </div>
 </div>

 <?php
 }
 

 ?>
 </div>

 <!--
    QuestionPage_right_side end div
 -->
</div>


<!--
    QuestionPageView end div
-->
</div>








</body>

<script src="function.js"></script>
<script src="like-dislike.js"></script>  
<script src="Question.js"></script>
<script src="QuestionPreview.js"></script>
<script src="survey.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('478ca7a0943e80ca8d92', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

      $.ajax({url:"notification_pusher.php",success:function (resault) {
        $('.All_notifications_div').html(resault);
    }});

    $.ajax({url:"notification_number_pusher.php",success:function (resault) {
        $('.Notifications_icon_number_div').html(resault);
    }});

    //  $.ajax({url:"comments_pusher.php",success:function (resault) {
    //     $('#Yorumlar').html(resault);
    // }});


    });
</script>




    <script>
// to stop sending post on refresh
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</html>