<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['UserID']);
      $mypassword = mysqli_real_escape_string($db,$_POST['Password']); 
      
      $sql = "SELECT UserID FROM Users_13009 WHERE UserID = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['Active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
	    
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 none 1px;
          
	    background-color: #dcdcdc;	
         }
	#pos{
	   position: fixed;
	   top: 50%;
	   left: 50%;
	   transform: translate(-50%,-50%);	
	}	 
	.button{
	  background-color: #333333;
	  border: none;
	  color: white;
	  padding: 10px 30px;
	  text-align: center;
 	  text-decoration: none;
	  display: inline-block;
	  font-size: 14px; 
	  margin-top: 30px;	
	}		
      </style>
      
   </head>
   
   <body background = "bgphp.jpg">
	
      <div align = "center" id="pos">
         <div style = "width:300px; border: none 1px #333333; background-color:#FFFFFF; padding-bottom: 30px;" align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label style="display: inline-block;">Username:</label><input type = "text" name = "UserID" class = "box"/><br /><br />
                  <label style="display: inline-block;">Password:</label><input type = "password" name = "Password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit " class="button"/><br />
               </form>
               
               
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
