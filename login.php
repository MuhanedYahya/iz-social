<?php 
require_once("connection.php");
Session_start();
$_SESSION["status"] ="Inactive";
Session_destroy();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
      <link rel="icon" href="images/students_32px.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginPageStyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet"> 
    
    <title>IZU SOCIAL</title>
</head>
<body>

<div id="rectangle">


<form action="login.php" method="post" class="container" id="LoginC" >
 
 <div style="order: 1;display: flex;flex-direction: column;align-items: center;justify-content: center;">
 <img src="images/izuLogo.png" alt="logo">
 <h1>SOCIAL</h1>

 </div>

 <div style="order: 2;display: flex;flex-direction: row;align-items: flex-start;justify-content: center;">

 <div class="icon_div" style="display: flex;flex-direction: row;align-items: center;justify-content: center;order:1">
    <span class="material-icons" style="font-size:25;align-self:center">
     person
    </span>
 </div>

 <input type="email" id="email" placeholder="name@std.izu.edu.tr" name="Login_Email" required style="order:2">
 </div>
    
 <div style="order: 3;display: flex;flex-direction: row;align-items: flex-start;justify-content: center;">

  <div class="icon_div" style="display: flex;flex-direction: row;align-items: center;justify-content: center;order:1">
    <span class="material-icons" style="font-size:23;align-self:center">
       lock
    </span>
 </div>
        <input type="password" id="password" placeholder="Password" name="Login_Password" required style="order:2">
 </div>

 <div style="order: 4;" id="Login_Button_Div">
    <button name="Login_Submit" class="Login_Button">
        Login
    </button>
 </div>
 
         

    <div style="order: 5;display: flex;flex-direction: row;align-items: center;flex-wrap: wrap;justify-content: center;">
          
        <a href="https://kampus.izu.edu.tr/ParolaSifirlama" target="_blank">
            <h4 style="margin-left: 15px;"> Forget Passsword?</h4>
         </a>

    </div>


</form>



<!--
    rectangle end div
-->
</div>


 <?php

    if (isset($_POST["Login_Submit"])) {

     $email=Filtre($_POST['Login_Email']);
        $password=Filtre($_POST['Login_Password']);


          $select_query=mysqli_query($connection,"SELECT * FROM users WHERE Email='$email' AND Password='$password'");

          $rowControl= mysqli_num_rows($select_query);

              
         
          if ($rowControl==1) {

             while($registration = mysqli_fetch_assoc($select_query)){

                session_start();

             $_SESSION["status"] ="Active";
             $_SESSION["userID"] =$registration["UserID"];
             $_SESSION["Email"] =$registration["Email"];
             $_SESSION["Name"] =$registration["Name"];
             $_SESSION["Password"] =$registration["Password"];
             $_SESSION["Phone_Number"] =$registration["Phone_Number"];
             $_SESSION["User_info"]=$registration["User_info"];
             $_SESSION["Profile_Picture"] =$registration["Profile_Picture"];

             $url="?userID=".$_SESSION['userID'];
              header("Location:index.php$url");
    }
           

         }

         else {

              ?>
           <script>
        document.getElementById("createAccount_label").innerHTML="Password or Email is incorrect";

           </script>
           <?php
             
         }

           

      

   }
 

 ?>

    
</body>


<script>
// to stop sending post on refresh
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


</html>







