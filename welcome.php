<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome!</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php include('session.php'); ?>

<body>
<style>
.navbar-default {
    background-color: #dcdcdc;
    border-color: #E7E7E7;
}
</style>


        <nav class="navbar navbar-expand-lg navbar-default ">
                <a class="navbar-brand" href="#" style= "text-transform: uppercase; font-weight: bold;">Asna Table</a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="users.php">Users<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="salesperson.php">Salespersons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="CreateTable.php">Customers</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="product.php">Product</a>
                    </li>
		    <form action='logout.php'>
			<input type="submit" value="Logout" style="background-color: #dcdcdc;
	  border: none; color: blue; margin-top: 8px;">
		    </form>
                  </ul>
                </div>
              </nav>


<h1 id="pos">Welcome User!</h1>




<!-- 
<div class='container'>

        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />

        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
    </div> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
</body>
<style>


body,html {

    height: 100%;
    background-image: url('bgphp.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    
}
.container{
    display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  justify-content: space-between;
}
.btn{
    opacity: 0.5 !important;
}
#pos{
	   position: fixed;
	   top: 50%;
	   left: 50%;
	   transform: translate(-50%,-50%);	
	}	
h1{
   color: white;
   font-size: 50px;
   text-transform: uppercase;
   font-weight: bold;	
}	 
</style>


</html>



