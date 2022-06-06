 <?php
require_once("connection.php");
    session_start();
    $SessionUserId=$_SESSION["userID"];
    $questionid=$_POST["QuestionID"];




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