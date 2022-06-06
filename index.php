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
    <title>IZU SOCIAL</title>

</head>
<body>


<!-- <div class="Messages_fixed_div">

 <div class="AlertBox">
asadasdassadsdaaaaaaaaaaaaaaaaa
 </div>

</div> -->


<div class="Question_Container_fixed_div">

 <div class="Add_Question_Container" >
    

 <div class="Questions_Header" style="order:1">
    <div class="Close">
        <span class="material-icons" style="color:#2D3138;font-size:30;cursor:pointer"  id="close_Question_Div" alt="close">
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

                <div class="flex_row_start" style="order:2;">

                    <div class="rowflex" id="Notifications_icon_media" style="order:1">
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

                     <div class="toggle_close_div" style="order:2;" id="toggle_button">
                        <i class="fas fa-bars font-adjust " style="font-size:25px;"></i>
                    </div>

                    <div class="toggle_close_div" style="order:2;" id="close_button">
                            <span class="material-icons " style="color:#2D3138;font-size:30px;cursor:pointer">
                                close
                            </span>
                    </div>


                </div>

                

            </div>

            <div  class="flex_column" style="order:2;;width:100%" id="icons_names_div">
                    <a href="index.php?userID=<?php echo $_SESSION["userID"];?>">
                <div class="divs_Hover">
                    Home
                </div>
                    </a>
                    <a >
                <!-- <div class="divs_Hover" id="Notifications_icon_media">
                   Notifications
                </div> -->
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





<div class="Home_Big_div" style="width:100%">

<div style="order:1;"  id="Home_order1">


<div class="Home_left_side">

    <div style="align-self:center;color:#8b2232;">
        <h6 >
        Öğretmen Paylaşımları
        </h6>
    </div>


       <?php
    $select_q=mysqli_query($connection,"SELECT * FROM questions");
    while($Questions = mysqli_fetch_array($select_q)){
      $userid=$Questions["UserID"];
   $select=mysqli_query($connection,"SELECT * FROM users WHERE UserID=$userid");
    $userinfo = mysqli_fetch_array($select);
    
    ?>

    <div class="rowflex" style="margin:15px 10px 15px 10px;">
      <div style="order:1">
        <div class="smallPicDiv" style="width:30;height:30;margin-right:10px;background-image: url(user_images/<?php echo $userinfo["Profile_Picture"];?>)"></div>
      </div>
    
        <div style=";font-size: 14px;word-wrap: break-word;font-weight: 600;order:2">
            <a style="color:#636466" href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo $Questions["QuestionID"];?>" class="Black_Link">
                <?php
                 echo $Questions["Question"];
                ?>
            </a>
        </div>


    </div>
    <?php
    }
    ?>

</div>


</div>



<div style="order:2;" id="Home_order2">



<div id="HomeQuestion" class="AskButton">

    <div style="display: flex;flex-direction: row;justify-content:flex-start;align-items:center">
            <a  href="ProfileEditor.php?userID=<?php echo $_SESSION["userID"];?>" class="Black_Link">
        <div class="smallPicDiv" style="background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
            </a>
        <h4 style="font-size: 17px;margin:10px;display:inline">
            <a  href="ProfileEditor.php?userID=<?php echo $_SESSION["userID"];?>" class="Black_Link">
            <?php
                echo $_SESSION["Name"];
            ?>
            </a> 
        </h4>
        
    </div>


    <div style="padding: 10px;">
    
        <h1 style="font-weight: normal;font-size: 20px;padding: 10px 30px 5px 30px;">
            What is your Question?
        </h1>

    </div>

</div>



<?php

  if (isset($_POST["search_botton"])) {
    $taken_question=Filtre($_POST['search_input']); 
  }
 else {
     $taken_question = "";
 }
 $select_q=mysqli_query($connection,"SELECT * FROM questions WHERE Question LIKE '%$taken_question%' ORDER BY QuestionID  DESC");
 while($AllQuestions = mysqli_fetch_array($select_q)){

    // User information
     $userid=$AllQuestions["UserID"];
     $questionid=$AllQuestions["QuestionID"];
   $select_userinfoQ=mysqli_query($connection,"SELECT * FROM users WHERE UserID=$userid");
    $userinfo_Q = mysqli_fetch_array($select_userinfoQ);
?>



<?php
    if($AllQuestions["Question_type"] == 1){
?>


<div id="Standard_Questions" >

 <div class="HomePage_Containers">

    <div style="order: 1;" class="HomePage_Containers_header">

        <div style="order:1;display:flex;flex-direction:row;align-items:center">
                <?php
                    if ( $userinfo_Q["UserID"]==$_SESSION["userID"]) {
                        $Profile_link="ProfileEditor.php?userID=" . $_SESSION["userID"];
                    }
                    else{
                        $Profile_link="Profile.php?userID=" . $_SESSION["userID"] . "&guestID=" . $userinfo_Q["UserID"];
                    }
                ?>

                <a href="<?php echo $Profile_link;?>" class="Black_Link">
            <div class="smallPicDiv" style="order: 1;margin-right:10px;background-image: url(user_images/<?php echo $userinfo_Q["Profile_Picture"];?>)"></div>
                </a>

            <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start">
                <div>
                    <a href="<?php echo $Profile_link;?>" class="Black_Link">
                        <?php
                            echo $userinfo_Q["Name"];
                        ?>
                    </a>
                </div>

                <div style="font-size: 10px;color:rgb(139, 138, 138)">
                    <?php
                    echo $AllQuestions["Question_Date"];
                    ?>
                </div>

            </div>   

        </div>

        <div style="order:2;display:flex;flex-direction:row;align-items:center">
            <div style="margin-right:10px" class="copyLink_icon" 
            data-id="http://localhost/PROJEM/QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>">
                <span class="material-icons " style="font-size:27;cursor: pointer">
                        link
                </span>
            </div>

            <div>
                <span class="material-icons Add_reply_icon" style="font-size:27;cursor: pointer;margin-right:5px" 
                id="Add_reply_icon_<?php echo $AllQuestions["QuestionID"];?>" data-id="<?php echo $AllQuestions["QuestionID"]; ?>">
                        reply
                </span>

            </div>

        </div>
      
    </div>
    
    <div style="order: 2;margin:20px 20px 10px 20px;font-size: 17px;word-wrap: break-word;font-weight: 700;">
     <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>" class="questionLink">
         <?php
        echo $AllQuestions["Question"];
          ?>
          </a>
    </div>

    <?php
     $select_a=mysqli_query($connection,"SELECT * FROM `answers` WHERE Parent_Answer_ID IS NULL AND QuestionID=$questionid ORDER BY Votes DESC LIMIT 1");

      $rowA= mysqli_num_rows($select_a);
      if ($rowA==1) {
        $AllAnswers = mysqli_fetch_array($select_a);
        $id=$AllAnswers["UserID"];
        $answerid=$AllAnswers["AnswerID"];

     $select_userinfoA=mysqli_query($connection,"SELECT * FROM users WHERE UserID=$id");
     $userinfo_A = mysqli_fetch_array($select_userinfoA);

     $rowNumber= mysqli_num_rows($select_userinfoA);

     if ($rowNumber==1) {
    ?>

    <div class="AnswerContainer" style="order: 3;">


     <div style="order: 1;display:flex;flex-direction:row;align-items:center">
            <?php
                if ( $userinfo_A["UserID"]==$_SESSION["userID"]) {
                    $Answer_Profile_link="ProfileEditor.php?userID=" . $_SESSION["userID"];
                }
                else{
                    $Answer_Profile_link="Profile.php?userID=" . $_SESSION["userID"] . "&guestID=" . $userinfo_A["UserID"];
                }
            ?>
            <a href="<?php echo $Answer_Profile_link;?>" class="Black_Link">
         <div class="smallPicDiv" style="order: 1;width:35;height:35;margin-right:10px;background-image: url(user_images/<?php echo $userinfo_A["Profile_Picture"];?>)"></div>
            </a>
         <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start">
         <div style="font-size:14px">
              <a href="<?php echo $Answer_Profile_link;?>" class="Black_Link">
             <?php
                echo $userinfo_A["Name"];
             ?>
            </a>
         </div>
          <div style="font-size: 10px;color:rgb(139, 138, 138)">
           <?php
          echo $AllAnswers["Answer_Date"];
           ?>
          </div>
        </div>   
      
     </div>
   

     <div style="margin:20px 20px 20px 20px;font-size: 17px;word-wrap: break-word;;order: 2" >
         <?php
        echo $AllAnswers["Answer"];
          ?>
     </div>

        <div class="HomePage_Containers_footer" >
            <ul>

                <li style="order: 1;margin-left: 10px;">
                    <div style="display: inline-block;margin-right: 15px;text-align: center;" >
                    <?php
                    $Select_info=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerid AND Voted=1 AND UserID=$SessionUserId");
                    $votedControl= mysqli_num_rows($Select_info);
                    if ($votedControl==1) {
                    ?>
                        <span class="material-icons Like" style="font-size: 25;cursor: pointer;display:none" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>

                        <span class="material-icons Un_Like" style="font-size: 25;cursor: pointer;color:#8B2232;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>
                    <?php }  else{ ?>
                        <span class="material-icons Like" style="font-size: 25;cursor: pointer;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                           thumb_up_alt
                        </span>

                        <span class="material-icons Un_Like" style="font-size: 25;cursor: pointer;color:#8B2232;display:none;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
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
                        <span class="material-icons Dislike" style="font-size: 24;cursor: pointer;display:none" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 24;cursor: pointer;color:#8B2232"
                         data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                               thumb_down
                        </span>
                    <?php }  else{ ?>    
                        <span class="material-icons Dislike" style="font-size: 24;cursor: pointer;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 24;cursor: pointer;color:#8B2232;display:none"
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
                <li style="order: 2;align-self: row-reverse;margin-right: 20px;" id="liID">
                    <span class="material-icons " style="font-size:28;cursor: pointer">
                       bookmark
                    </span>
                </li>
            </ul>
          

        </div>

         
        <!--
            AnswerContainer end div
        -->
    </div>

      <?php
    }
      }

    
     
     else {
         ?>
         <script>
         document.getElementById("CevaplardanBiri").style.display="none";
         </script>

         <?php
        }
     ?>
     

        <div style="order: 4" class="flex_space optional_yesNo_footer">
                    <?php
                $selectAllAnswers=mysqli_query($connection,"SELECT * FROM `answers` WHERE QuestionID=$questionid");
                @$AnswersAllRows = mysqli_num_rows($selectAllAnswers);
            ?>
                    <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>" style="text-decoration: none;">
            <div class="flex_row_start optional_yesNo_div_hover" style="padding:5px 10px 5px 10px">
                <?php if($AnswersAllRows>0){ ?>
                <div style="margin-right:8px">
                            <i class="far fa-comments font-adjust" style="font-size:22px;color:#494D59"></i>
                </div>
                <div style="font-size:13px;color:#2D3138">
                    <?php echo   $AnswersAllRows;?>
                </div>
                <?php }else{ ?>
                    <div>
                            <i class="far fa-comments font-adjust" style="font-size:22px;color:#494D59"></i>
                    </div>
                <?php } ?>




            </div>
                    </a>
                 

        </div>
    

    <!--
    SorulardanBiri end div
 -->
 </div>


    <div style="order:5;display:none;" class="HomePost_Reply" id="ReplyFor_<?php echo  $AllQuestions["QuestionID"];?>">

     <div class="smallPicDiv" 
     style="width:10%;;order: 1;margin-right:10px;width:40;height:40;
     background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
    
        <div class="HomePost_Reply_Text_Area_Div" >
           <textarea  id="Comment_<?php echo $AllQuestions["QuestionID"]; ?>" class="HomePost_reply_input"
            placeholder="Add Comment" maxlength="300" required
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
        </div>


     <div style="order: 3;width:9%" class="rowflex">
        <span class="material-icons Add_reply" style="font-size: 40;cursor: pointer;color:#8B2232" data-id="<?php echo $AllQuestions["QuestionID"]; ?>">
                         add
        </span>
     </div>

    </div>



    <div class="Comment_Sent_Div" id="Comment_Sent_Div_<?php echo $AllQuestions["QuestionID"]; ?>" style="display:none">

     <div style="display:inline;margin-right:5px">
         <span class="material-icons" style="font-size: 40;cursor: pointer;color:white">
             done
         </span>
     </div>

     <div style="display:inline;font-size:15px;color:white">
         Your comment has been sent.
     </div>


    </div>


    
    <div class="Comment_Error_Div" id="Comment_Error_Div_<?php echo $AllQuestions["QuestionID"]; ?>" style="display:none">

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
Standard_Questions end div
-->
</div>

<?php
    }
    else if($AllQuestions["Question_type"] == 2){
?>


<div id="Optional_Questions">
    

 <div class="HomePage_Containers">


        <div style="order: 1;" class="HomePage_Containers_header">

            <div style="order:1;display:flex;flex-direction:row;align-items:center">
                    <?php
                        if ( $userinfo_Q["UserID"]==$_SESSION["userID"]) {
                            $Profile_link="ProfileEditor.php?userID=" . $_SESSION["userID"];
                        }
                        else{
                            $Profile_link="Profile.php?userID=" . $_SESSION["userID"] . "&guestID=" . $userinfo_Q["UserID"];
                        }
                    ?>

                    <a href="<?php echo $Profile_link;?>" class="Black_Link">
                <div class="smallPicDiv" style="order: 1;margin-right:10px;background-image: url(user_images/<?php echo $userinfo_Q["Profile_Picture"];?>)"></div>
                    </a>

                <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start">
                    <div>
                        <a href="<?php echo $Profile_link;?>" class="Black_Link">
                            <?php
                                echo $userinfo_Q["Name"];
                            ?>
                        </a>
                    </div>

                    <div style="font-size: 10px;color:rgb(139, 138, 138)">
                        <?php
                        echo $AllQuestions["Question_Date"];
                        ?>
                    </div>

                </div>   

            </div>

            <div style="order:2;display:flex;flex-direction:row;align-items:center">
                <div style="margin-right:10px" class="copyLink_icon" 
            data-id="http://localhost/PROJEM/QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>">
                <span class="material-icons " style="font-size:27;cursor: pointer">
                        link
                </span>
            </div>

                <div>
                    <span class="material-icons Add_reply_icon" style="font-size:27;cursor: pointer;margin-right:5px" 
                    id="Add_reply_icon_<?php echo $AllQuestions["QuestionID"];?>" data-id="<?php echo $AllQuestions["QuestionID"]; ?>">
                            reply
                    </span>

                </div>

            </div>
      
        </div>

     <div style="order: 2;margin:20px 20px 10px 20px;font-size: 17px;word-wrap: break-word;font-weight: 700;" >
        <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>" class="questionLink">
         <?php
         echo $AllQuestions["Question"];
          ?>
        </a>
     </div>

  

    <div class="HomePage_Options"  style="order:3">

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



        <div style="order: 4" class="flex_space optional_yesNo_footer">
                        <?php
                        $select = mysqli_query($connection , "SELECT * FROM recorded_information 
                WHERE QuestionID = $questionid");
                @$AllRows = mysqli_num_rows($select);
                    $selectAllAnswers=mysqli_query($connection,"SELECT * FROM `answers` WHERE QuestionID=$questionid and Answer is not null");
                    @$AnswersAllRows = mysqli_num_rows($selectAllAnswers);
                ?>
                        <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>" style="text-decoration: none;">
                <div class="flex_row_start optional_yesNo_div_hover" style="padding:5px 10px 5px 10px">
                    <div style="margin-right:8px">
                                <i class="far fa-comments font-adjust" style="font-size:22px;color:#494D59"></i>
                    </div>
                    <div style="font-size:13px;color:#2D3138">
                        <?php echo   $AnswersAllRows?>
                    </div>
                </div>
                        </a>


                <div class="flex_row_start optional_yesNo_div_hover" style="padding:5px 10px 5px 10px">
                 <div style="display:none" id="people_icon_<?php echo $questionid;?>">
                    <span class="material-icons-outlined"  style="font-size:25px;color:#494D59;margin-right:8px">
                        people
                    </span>
                </div>
                <div style="display:none;font-size:13px;color:#2D3138" id="hidden_voters_number_<?php echo $questionid;?>">
                        <?php echo  $AllRows; ?>
            
                </div>
                    <?php if($AllRows > 0){?>
                                <div>
                                    <span class="material-icons-outlined"  style="font-size:25px;color:#494D59;margin-right:8px">
                                        people
                                    </span> 
                                    <!-- <i class="fas fa-users font-adjust" style="font-size:19px;color:#494D59;margin-right:8px"></i> -->
                                </div>
                                <div style="font-size:13px;color:#2D3138" id="voters_number_<?php echo $questionid;?>">
                                    <?php echo   $AllRows ; ?>
                                </div>
                    <?php } else{?>
                            <div>
                            <!-- <i class="fas fa-users-slash font-adjust" style="font-size:19px;color:#d6d6d6;margin-right:8px"></i> -->
                            <span class="material-icons-outlined"  style="font-size:23px;color:#494D59;" id="group_off_icon_<?php echo $questionid;?>">
                                        group_off
                            </span> 

                            </div>
                        
                    <?php }?> 
                </div>
                        


        </div>


    <!-- 
    HomePage_Containers end div
    -->
    </div>


        <div style="order:5;display:none;" class="HomePost_Reply" id="ReplyFor_<?php echo  $AllQuestions["QuestionID"];?>">

            <div class="smallPicDiv" 
            style="width:10%;;order: 1;margin-right:10px;width:40;height:40;
            background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
            
                <div class="HomePost_Reply_Text_Area_Div" >
                <textarea  id="Comment_<?php echo $AllQuestions["QuestionID"]; ?>" class="HomePost_reply_input"
                    placeholder="Add Comment" maxlength="300" required
                    rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
                </div>


            <div style="order: 3;width:9%" class="rowflex">
                <span class="material-icons Add_reply" style="font-size: 40;cursor: pointer;color:#8B2232" data-id="<?php echo $AllQuestions["QuestionID"]; ?>">
                                add
                </span>
            </div>

        </div>



        <div class="Comment_Sent_Div" id="Comment_Sent_Div_<?php echo $AllQuestions["QuestionID"]; ?>" style="display:none">

            <div style="display:inline;margin-right:5px">
                <span class="material-icons" style="font-size: 40;cursor: pointer;color:white">
                    done
                </span>
            </div>

            <div style="display:inline;font-size:15px;color:white">
                Your comment has been sent.
            </div>


        </div>


        
        <div class="Comment_Error_Div" id="Comment_Error_Div_<?php echo $AllQuestions["QuestionID"]; ?>" style="display:none">

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
    Optional_Questions end div
    -->
    </div>



<?php
    }
    else if($AllQuestions["Question_type"] == 3){
?>


<div id="YesNo_Questions">

 <div class="HomePage_Containers">

    <div style="order: 1;" class="HomePage_Containers_header">

            <div style="order:1;display:flex;flex-direction:row;align-items:center">
                    <?php
                        if ( $userinfo_Q["UserID"]==$_SESSION["userID"]) {
                            $Profile_link="ProfileEditor.php?userID=" . $_SESSION["userID"];
                        }
                        else{
                            $Profile_link="Profile.php?userID=" . $_SESSION["userID"] . "&guestID=" . $userinfo_Q["UserID"];
                        }
                    ?>

                    <a href="<?php echo $Profile_link;?>" class="Black_Link">
                <div class="smallPicDiv" style="order: 1;margin-right:10px;background-image: url(user_images/<?php echo $userinfo_Q["Profile_Picture"];?>)"></div>
                    </a>

                <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start">
                    <div>
                        <a href="<?php echo $Profile_link;?>" class="Black_Link">
                            <?php
                                echo $userinfo_Q["Name"];
                            ?>
                        </a>
                    </div>

                    <div style="font-size: 10px;color:rgb(139, 138, 138)">
                        <?php
                        echo $AllQuestions["Question_Date"];
                        ?>
                    </div>

                </div>   

            </div>

            <div style="order:2;display:flex;flex-direction:row;align-items:center">
                <div style="margin-right:10px" class="copyLink_icon" 
            data-id="http://localhost/PROJEM/QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>">
                <span class="material-icons " style="font-size:27;cursor: pointer">
                        link
                </span>
            </div>

                <div>
                    <span class="material-icons Add_reply_icon" style="font-size:27;cursor: pointer;margin-right:5px" 
                    id="Add_reply_icon_<?php echo $AllQuestions["QuestionID"];?>" data-id="<?php echo $AllQuestions["QuestionID"]; ?>">
                            reply
                    </span>

                </div>

            </div>
      
    </div>

    <div style="order: 2;margin:20px 20px 10px 20px;font-size: 17px;word-wrap: break-word;font-weight: 700;align-self:center" >
        <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>" class="questionLink">
         <?php
         echo $AllQuestions["Question"];
          ?>
        </a>
    </div>



 <div style="order: 3" class="Yes_No_big_Container">

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



   <div style="order: 3" class="flex_space optional_yesNo_footer">
                <?php
            $selectAllAnswers=mysqli_query($connection,"SELECT * FROM `answers` WHERE QuestionID=$questionid");
            @$AnswersAllRows = mysqli_num_rows($selectAllAnswers);
           ?>
                <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>" style="text-decoration: none;">
        <div class="flex_row_start optional_yesNo_div_hover" style="padding:5px 10px 5px 10px">
            <div style="margin-right:8px">
                        <i class="far fa-comments font-adjust" style="font-size:22px;color:#494D59"></i>
            </div>
            <div style="font-size:13px;color:#2D3138">
                <?php echo   $AnswersAllRows?>
            </div>
        </div>
                </a>


        <div class="flex_row_start optional_yesNo_div_hover" style="padding:5px 10px 5px 10px">
                <div style="display:none" id="people_icon_<?php echo $questionid;?>">
                    <span class="material-icons-outlined"  style="font-size:25px;color:#494D59;margin-right:8px">
                        people
                    </span>
                </div>
                <div style="display:none;font-size:13px;color:#2D3138" id="hidden_voters_number_<?php echo $questionid;?>">
                        <?php echo  $YesNo_array["Yes"]+$YesNo_array["No"]; ?>
            
                </div>
                
                <?php if($YesNo_array["Yes"]+$YesNo_array["No"]> 0){?>
                <div>
                    <span class="material-icons-outlined"  style="font-size:25px;color:#494D59;margin-right:8px">
                        people
                    </span>
                    <!-- <i class="fas fa-poll font-adjust"  style="font-size:25px;color:#494D59;margin-right:8px"></i> -->
                </div>
                <div style="font-size:13px;color:#2D3138" id="voters_number_<?php echo $questionid;?>">
                        <?php echo  $YesNo_array["Yes"]+$YesNo_array["No"]; ?>
            
                </div>
                    
                <?php } else{?>

                    <div>
                        <!-- <i class="fas fa-users-slash font-adjust" style="font-size:19px;color:#d6d6d6;margin-right:8px"></i> -->
                        <span class="material-icons-outlined"  style="font-size:23px;color:#494D59;" id="group_off_icon_<?php echo $questionid;?>">
                                    group_off
                        </span> 
                    </div>

                 <?php }?>
        </div>


    </div>




  <!-- HomePage_Containers end div  -->
 </div>


    <div style="order:5;display:none;" class="HomePost_Reply" id="ReplyFor_<?php echo  $AllQuestions["QuestionID"];?>">

     <div class="smallPicDiv" 
     style="width:10%;;order: 1;margin-right:10px;width:40;height:40;
     background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
    
        <div class="HomePost_Reply_Text_Area_Div" >
           <textarea  id="Comment_<?php echo $AllQuestions["QuestionID"]; ?>" class="HomePost_reply_input"
            placeholder="Add Comment" maxlength="300" required
            rows="1"  onkeypress="auto_grow(this)" onkeyup="auto_grow(this)"></textarea>
        </div>


     <div style="order: 3;width:9%" class="rowflex">
        <span class="material-icons Add_reply" style="font-size: 40;cursor: pointer;color:#8B2232" data-id="<?php echo $AllQuestions["QuestionID"]; ?>">
                         add
        </span>
     </div>

    </div>



    <div class="Comment_Sent_Div" id="Comment_Sent_Div_<?php echo $AllQuestions["QuestionID"]; ?>" style="display:none">

     <div style="display:inline;margin-right:5px">
         <span class="material-icons" style="font-size: 40;cursor: pointer;color:white">
             done
         </span>
     </div>

     <div style="display:inline;font-size:15px;color:white">
         Your comment has been sent.
     </div>


    </div>


    
    <div class="Comment_Error_Div" id="Comment_Error_Div_<?php echo $AllQuestions["QuestionID"]; ?>" style="display:none">

      <div style="display:inline;margin-right:5px">
         <span class="material-icons" style="font-size: 35;cursor: pointer;color:white">
             error
         </span>
      </div>

      <div style="display:inline;font-size:15px;color:white">
         Your comment cannot be blank.
      </div>


    </div>
 



 <!-- YesNo_Questions end div -->
</div>


<?php
    }
?>



<!-- $AllQuestions end while -->

<?php
}
?> 

</div>



<div style="order:3;" id="Home_order3">

    <div class="Home_right_side">

        <div style="align-self:center;color:#8b2232;font-weight:bolder;">
            <h6 >
                En çok Konuşulan
            </h6>
        </div>

        <?php
    $select_q=mysqli_query($connection,"SELECT * FROM questions");
    while($Questions = mysqli_fetch_array($select_q)){
    ?>

    <div style="border-bottom: 1px solid #d6d6d6;margin:15px 10px 15px 10px;padding-bottom:10px;width:90%">

        <div style="font-size: 15px;word-wrap: break-word;font-weight: 600;">
            <a style="color:#636466" href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo $Questions["QuestionID"];?>" class="Black_Link">
                <?php
                echo $Questions["Question"];
                ?>
                </a>
        </div>

    </div>

    <?php
    }
    ?>



    </div>




</div>










<!-- Home_Big_div end -->
</div>




</body>

<script src="function.js"></script>
<script src="like-dislike.js"></script>  
<script src="Question.js"></script>
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


    });
</script>

<script>
// to stop sending post on refresh
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


</html>