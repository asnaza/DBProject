<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select UserID from User_13009 where UserID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['UserID'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
