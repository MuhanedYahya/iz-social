<?php
require_once("connection.php");
    session_start();

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
    <link rel="stylesheet" href="Profile_Style.css">
    <title>IZU SOCIAL</title>
</head>
<body>
 
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
                <a class="nav-link" href="#">
                    <i class="fas fa-bell font-adjust nav_icons_color" style="font-size:25px"></i>
                </a>
                <div class="hidden_titles" id="Notifications_title" style="top:53">
                    <div style="text-align: center;" >
                    Notifications
                    </div>
                </div>
                <div class="Notifications_icon_number">
                    1
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
                <div style="order:1;cursor:pointer;width:10%;" class="icon_div rowflex">
                <span class="material-icons" name="search_botton" style="font-size:25;color:#999CA6s;">
                    search
                </span>
                </div>
                <div style="order:2;width:90%">
                <input type="text" id="search" placeholder="Search" name="search_input" >
                </div>
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
                    <a href="#">
                <div class="divs_Hover" >
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





<div id="Profile_Info_Edit">


 <form action="" method="post" enctype= multipart/form-data>

    <div style="display: flex;flex-direction: row;justify-content:flex-start;align-items: flex-start; flex-wrap: wrap;">

        <div style="display: flex;flex-direction: column;justify-content:flex-start;align-items: flex-start;">

          <div class="profilePicDiv" style="border-style:none;background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>

          <div style="margin:10px;">
            <input type="file" name="imageFile">
          </div>

        </div>

      <div>
       <textarea name="textarea" id="textareaProfileEdit" cols="30" rows="10"
        placeholder='You can add your additional information here.' maxlength="200">
       <?php echo $_SESSION["User_info"];?>
       </textarea>
      </div>

    </div>


   <div style="display: flex;flex-direction: column;justify-content:flex-start;align-items: center;">

    <label for="nameInput">Username:</label>
    <input type="text" name="nameInput" class="ProfileInputs" value="<?php echo $_SESSION["Name"];?>">

    <label for="telephon">Phone Number:</label>
    <input type="tel" name="telephon" class="ProfileInputs"  value="<?php echo $_SESSION["Phone_Number"];?>">


    <div style="margin-top:20px">
       <input type="submit" value="Edit" class="Button" name="Profile_Info_Edit_Submit">
       <input type="button" value="Cancel" class="Button" onclick="closeButtonEdit_Profile()">
    </div>

   </div>



 </form>

   <?php

    if (isset($_POST["Profile_Info_Edit_Submit"])) {

        $nameInput=Filtre($_POST['nameInput']);
        $telephon=Filtre($_POST['telephon']);
        $textarea=Filtre($_POST['textarea']);
        $userid=$_SESSION["userID"];

          


        if ($nameInput!=$_SESSION["Name"]||$telephon!=$_SESSION["Phone_Number"]
        ||$textarea!=$_SESSION["User_info"]||$_FILES["imageFile"]["name"]!=$_SESSION["Profile_Picture"]) 
        {

              $picName=rand(1000,10000)."-".$_FILES["imageFile"]["name"];
            $tname=$_FILES["imageFile"]["tmp_name"];
            $uploads_dir="user_images"."/".$picName;
            move_uploaded_file($tname,$uploads_dir);

            

            $select_query=mysqli_query($connection,"UPDATE users SET Name='$nameInput',Phone_Number='$telephon'
            ,User_info='$textarea' WHERE UserID=$userid");
            $_SESSION["Name"] =$nameInput;
            $_SESSION["Phone_Number"] =$telephon;
            $_SESSION["User_info"] = $textarea;

            if ($_FILES["imageFile"]["name"]!="") {
                $select_query=mysqli_query($connection,"UPDATE users SET Profile_Picture='$picName' WHERE UserID=$userid");
                $_SESSION["Profile_Picture"]=$picName;
            }
            // header("Location:ProfileEditor.php?userID=$_SESSION['userID']");
            // header('Location: '.$_SERVER['PHP_SELF']);
            


           

            ?>
            

            <?php
            echo "<meta http-equiv='refresh' content='0'>";
            
        }

        else {

            ?>
            <script>
            alert("No change");
            </script>

            <?php
            
        }
        




    }

  ?>


</div>



<div class="ProfilePage_Box">

<div style="order:1" class="left_Side">

<div id="ProfileDiv">


             <div style="position:relative;display:inline" class="turnHover">
             <div class="profilePicDiv" style="order:1;background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
             <div class="Pic_hover_div">
                <span class="material-icons-outlined edit_circle" style="font-size:25;cursor: pointer;color:black;" onclick="OpenButtonEdit_Profile()">
                         edit
                </span>
             </div>

             </div>



             <div style="order:5;display: flex;flex-direction: row;justify-content:center;align-items: flex-start;">
                <img src="images/students_30px.png" alt="student" >

                <a href="http://">
                 <img src="images/microsoft_stream_2019_30px.png" alt="stream" style="margin:0px 8px 0px 8px" class="scale_motion">
                </a>
               <a href="http://">
                <img src="images/microsoft_outlook_2019_30px.png" alt="outlook" class="scale_motion">
               </a>
               <a href="http://">
                 <img src="images/moodle_30px.png" alt="moodle" style="margin:0px 8px 0px 8px" class="scale_motion">
               </a>
                <a href="http://">
                  <img src="images/microsoft_teams_2019_30px.png" alt="teams" class="scale_motion">
                </a>
            </div>
        


    <div class="info rowflex" style="order:2;word-wrap: break-word;max-width:130px;">
            <div>
                <h5 style="color:black;order:2">
                <?php
                    echo $_SESSION["Name"];
                ?>
                </h5>
            </div>
            <div>
               <span class="material-icons-outlined scale_motion" style="font-size:22;cursor: pointer;color:black;" onclick="OpenButtonEdit_Profile()">
                         edit
                </span>
            </div>
    </div>




 <div class="textareaProfile" style="background-color:#8B2232;color:white;order:3">
  <p>
  Bilgisayar Mühendisliği<br>
  2. Sınıf<br>
  -- okuldan sabit bilgiler
  </p>
 </div>


  <div class="textareaProfile" style="order:4;margin:10px 0px 10px 0px">
  <p>
     <?php
         echo $_SESSION["User_info"];
     ?>
     </p>
 </div>

    <!--
        Profile end div
    -->
</div>


 <div class="profileMenu">
     <div class="Half_Menu" id="QButton">
         <span class="material-icons" style="font-size:30;cursor: pointer;color:white;" >
                         quiz
        </span>
     </div>

     <div class="Half_Menu" id="AButton">
          <span class="material-icons" style="font-size:30;cursor: pointer;color:white;" >
                         question_answer
          </span>
     </div>
 </div>


<!-- left_Side end div -->
</div>



<div style="order:2;" class="right_Side">

<div id="Sorularim">



 <?php
 $userid=$_SESSION["userID"];
 
 $select_query=mysqli_query($connection,"SELECT * FROM questions WHERE UserID=$userid ORDER BY QuestionID DESC");
 while($AllQuestions = mysqli_fetch_assoc($select_query)){
 $questionid=$AllQuestions["QuestionID"];
     
 ?>



    
 <div class="ProfilePage_Containers" id="ProfilePage_Containers_<?php echo $AllQuestions['QuestionID']; ?>">

     <div style="order: 1;display:flex;flex-direction:row;align-items:center">
       
         <div class="smallPicDiv" style="order: 1;margin-right:10px;background-image: url(user_images/<?php echo $_SESSION["Profile_Picture"];?>)"></div>
        <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start">
         <div>
         <a href="ProfileEditor.php?userID=<?php echo $_SESSION["userID"];?>" class="Black_Link">
            <?php
               echo $_SESSION["Name"];
            ?>
         </a>
         </div>

          <div style="font-size: 10px;margin-top:3px;color:rgb(139, 138, 138)">
           <?php
          echo $AllQuestions["Question_Date"];
           ?>
          </div>
        </div>   
      
    </div>

    <div style="padding:20px 20px 20px 20px;font-size: 17px;order: 2;word-wrap: break-word;font-weight: bold;">
    <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>" class="questionLink">
        <?php echo $AllQuestions["Question"];?>
     </a>
    </div>
    


    <div class="ProfilePage_Containers_footer" style="order:3;">

           <div style="margin:0px 20px 0px 15px" class="rowflex simpleHover">
            <div>
               <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $AllQuestions["QuestionID"];?>"
              style="text-decoration: none;color: black;">
                <!-- <img src="images/comment_25px.png" alt="comment" style="margin-left: 5px;float: left;"> -->
                <span class="material-icons" alt="deleteIcon" style="font-size:25;margin-left: 5px;float: left;cursor: pointer;">
                       comment
                </span>
            </div>
            <div>
                <h6 style="margin-top: 2px;font-weight: normal;float: left;margin-left: 5px;">
                <?php
                 $selectquery=mysqli_query($connection,"SELECT * FROM answers WHERE QuestionID=$questionid");
                 $row= mysqli_num_rows($selectquery);
                 echo $row;
                ?>
                </h6>
            </div>
            <div>
                <h6 style="margin-top: 2px;font-weight: normal;float: left;margin-left: 5px;padding-right:5px">Answer</h6>
                </a>
            </div>
            </div>



             <div style="margin-right: 15px">
            <div id="X_<?php echo  $AllQuestions["QuestionID"];?>">
                <span class="material-icons" alt="link" style="font-size:30;margin-right: 5px;cursor: pointer;">
                       link
                </span>

                <span class="material-icons open_DeleteOrNot_Question" alt="deleteIcon" style="font-size:28;cursor: pointer;" 
                    data-id="<?php echo $AllQuestions['QuestionID']; ?>">
                       delete_forever
                </span>
            </div>

            <div class="rowflex" style="display:none" id="Question_remove_div_<?php echo $AllQuestions['QuestionID']; ?>">
                        <div class="bottom_border_Div Delete_Question" style="margin-right:15px" data-id="<?php echo $AllQuestions["QuestionID"]; ?>">
                            <h6>remove</h6>
                        </div>
                        <div class="bottom_border_Div dont_Remove_Question"  data-id="<?php echo $AllQuestions["QuestionID"];?>">
                            <h6>cancel</h6>
                        </div>
                    </div>
            </div>

        </div>

    </div>

   


 <?php

 }


 ?>

  



 <!--
    sorularim end div
 -->
</div>


<div id="Cevaplarim">

 <?php
 $userid=$_GET["userID"];
 $select_A=mysqli_query($connection,"SELECT * FROM `answers` WHERE UserID=$userid AND Parent_Answer_ID IS NULL ORDER BY AnswerID DESC");
 while($AllAnswers = mysqli_fetch_assoc($select_A)){
    $answerid=$AllAnswers["AnswerID"];
    $questionid=$AllAnswers["QuestionID"];
    $select_userinfo=mysqli_query($connection,"SELECT * FROM users WHERE UserID=$userid");
    while($userinfo = mysqli_fetch_assoc($select_userinfo)){

        $select_question=mysqli_query($connection,"SELECT * FROM questions WHERE QuestionID=$questionid");
    $question_info = mysqli_fetch_array($select_question)

 ?>

 <div class="ProfilePage_Containers" id="ProfilePage_Containers_<?php echo $AllAnswers['AnswerID']; ?>">

    <div style="order: 1;display:flex;flex-direction:row;align-items:center">
 

         <div class="smallPicDiv" style="order: 1;margin-right:10px;background-image: url(user_images/<?php echo $userinfo["Profile_Picture"];?>)"></div>
        <div style="order: 2;display:flex;flex-direction:column;align-items:flex-start">
         <div>
         <a href="ProfileEditor.php?userID=<?php echo $userinfo["userID"];?>" class="Black_Link">
            <?php
               echo $userinfo["Name"];
            ?>
         </a>
         </div>

          <div style="font-size: 10px;margin-top:3px;color:rgb(139, 138, 138)">
           <?php
          echo $AllAnswers["Answer_Date"];
           ?>
          </div>
        </div>   
      
    </div>


  <div style="margin:20px 20px 20px 20px;font-size: 17px;word-wrap: break-word;order: 2;font-weight: bold;" id="forquestionid">
      <a href="QuestionPreview.php?userID=<?php echo $_SESSION["userID"];?>&QuestionID=<?php echo  $question_info["QuestionID"];?>" class="questionLink">
         <?php
        echo $question_info["Question"];
          ?>
          </a>
  </div>

 

 <div style="margin:0px 20px 20px 20px;font-size: 16px;word-wrap: break-word;;order: 2">
         <?php
        echo $AllAnswers["Answer"];
          ?>
 </div>


 <div class="ProfilePage_Containers_footer" style="order:3;">

         <div style="margin-left:15px">

            <div style="display: inline-block;margin-right: 15px;text-align: center;">
             <?php
                    $Select_info=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerid AND Voted=1");
                    $votedControl= mysqli_num_rows($Select_info);
                    if ($votedControl==1) {
                    ?>
                        <span class="material-icons Like" style="font-size: 25;cursor: pointer;display:none;" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
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
                    $info_Select=mysqli_query($connection,"SELECT * FROM `recorded_information` WHERE AnswerID=$answerid AND UnVoted=1");
                    $UnvotedControl= mysqli_num_rows($info_Select);
                    if ($UnvotedControl==1) {
                    ?>
                        <span class="material-icons Dislike" style="font-size: 24;cursor: pointer;display:none" data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                               thumb_down
                        </span>

                        <span class="material-icons Un_Dislike" style="font-size: 24;cursor: pointer;color:#8B2232;"
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


                   </div>

           <div style="margin-right: 15px">
            <div id="X_<?php echo  $AllAnswers["AnswerID"];?>">
                <span class="material-icons" alt="link" style="font-size:30;margin-right: 5px;cursor: pointer;">
                       link
                </span>

                <span class="material-icons open_DeleteOrNot_Answer" alt="deleteIcon" style="font-size:28;cursor: pointer;" 
                    data-id="<?php echo $AllAnswers['AnswerID']; ?>">
                       delete_forever
                </span>
            </div>

            <div class="rowflex" style="display:none" id="Answer_remove_div_<?php echo $AllAnswers['AnswerID']; ?>">
                        <div class="bottom_border_Div Remove_Answer" style="margin-right:15px" data-id="<?php echo $AllAnswers["AnswerID"]; ?>">
                            <h6>remove</h6>
                        </div>
                        <div class="bottom_border_Div dont_Remove_Answer"  data-id="<?php echo $AllAnswers["AnswerID"];?>">
                            <h6>cancel</h6>
                        </div>
            </div>

        </div>


        </div>

 </div>

 <?php


    }


 }

 ?>


 <script>
 // to stop sending post on refresh
 if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
 }
 </script>




 <!--
 Cevaplarim end div
 -->
</div>


<!-- right_Side end div -->
</div>


<!-- ProfilePage_Box end div -->

</div>




</body>
<script src="function.js"></script>
<script src="like-dislike.js"></script>  
<script src="Question.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



</html>