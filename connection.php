<?php


try{
    $connection=mysqli_connect('localhost','root','','qanda_database');
 }
 catch(Exception $Hata){
     echo $Hata->ErrorInfo;
     die();
 }


 
 function Filtre($value){
     $one = trim($value);
     $two = strip_tags($one);
     $three = htmlspecialchars($two , ENT_QUOTES);
     $last = $three;
     return $last;
 }


 function Restore($value){
    $Restore = htmlspecialchars_decode($value,ENT_QUOTES);
    $last = $Restore;
    return $last;
}
 





?>