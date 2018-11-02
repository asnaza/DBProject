<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css">
</head>

 <body>
 <style>
.navbar-default {
    background-color: #dcdcdc;
    border-color: #E7E7E7;
}
 </style>
   <nav class="navbar navbar-expand-lg navbar-default ">
                <a class="navbar-brand" href="#" style= "text-transform: uppercase; font-weight: bold; margin-bottom: 4px;">Paint Shop</a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="welcome.php">Home</a>
                    </li>
                    
		    <form action='logout.php'>
			<input type="submit" value="Logout" style="background-color: #dcdcdc; border: none; color: blue; margin-top: 8px;">
		    </form>
                  </ul>
                </div>
              </nav>
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
</html> 

<?php
include('config.php');

$a=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

$searchQ = mysqli_query($conn,"SELECT * FROM Customer_13009 WHERE ShopID = $a");
//$sql = "SELECT * FROM Customer_13009 WHERE ShopID = $a";
	pr($searchQ);
function pr($result2){
//$result2 = $conn->query($sql);
if ($result2->num_rows > 0) {
          echo "<div class='container'> 
         <table align='center'>
		
		
	
 <tr>
	 <th>Shop ID</th>
	 <th>Shop Name</th>
	 <th>Contact Person</th>
	 <th>Contact Number</th>
	 <th>Area</th>
	 <th>Address</th>
	 <th>Coordinates</th>
	 <th>Edit/Delete</th>
	 </tr>";
    // output data of each row
    while($row = $result2->fetch_assoc()) {
         echo "<tr>
	     <td>".$row["ShopID"]."</td>
	     <td>".$row["ShopName"]."</td>
	     <td>".$row["ContactPerson"]."</td>
	     <td>".$row["ContactNo"]."</td>
	     <td>".$row["Area"]."</td>
	     <td>".$row["Address"]."</td>
		
	       <td>".$row["Coordinates"]."</td>";  
	echo "<td>";
            // we will use this links on next part of this post
            echo "<a href='http://localhost/DBProject/CreateTable.php' class='btn btn-primary'>BACK</a>";
 	echo " ";
	echo "</td>";	 echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}



}

$searchQ22 = mysqli_query($conn,"SELECT * FROM Invoice_13009 WHERE ShopID = $a");
if ($searchQ22->num_rows > 0){

	 echo '<div class="container"> 
         <table align="center">
		
		
	
 <tr id="header">
	
	 <th>ShopID</th>
	 <th>ShopName</th>
	 <th>ProductCode</th>
	 <th>Brand</th>
	 <th>Type</th>
	 <th>Item</th>
	 <th>Size</th>
	 <th>Quantity</th>
	 <th>Price</th>
	 </tr>';
    // output data of each row
    while($row = $searchQ22->fetch_assoc()) {
	      
 echo "<tr>
	     <td>".$row["ShopID"]."</td>
	     <td>".$row["ShopName"]."</td>
	     <td>".$row["ProductCode"]."</td>
	     <td>".$row["Brand"]."</td>
	     <td>".$row["Type"]."</td>
	     <td>".$row["Item"]."</td>
	     <td>".$row["Size"]."</td>
	     <td>".$row["Quantity"]."</td>
	     <td>".$row["Price"]."</td>";  
	echo "<td>";
            // we will use this links on next part of this post
            echo "<a href='http://localhost/DBProject/invoice_u.php?id={$row["SNo"]}' class='btn btn-primary'>Edit</a>";
 	echo " ";
            // we will use this links on next part of this post
            echo "<a href='http://localhost/DBProject/invoice_d.php?id={$row["SNo"]}'  class='btn btn-primary'>Delete</a>";echo "</td>";
	 echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results";
}





// insert 

if(isset($_POST['INSERT']) ||isset($_POST['SEARCH'])  ){

$x = $_POST['a'];
$b = $_POST['b'];
$e = $_POST['e'];


	if(isset($_POST['INSERT'])){
	
	$RES1 =mysqli_query($conn,"SELECT * FROM Product_13009 WHERE ProductCode = $b ");
	$ROW1 = $RES1->fetch_assoc();
	$c = $ROW1['Brand'];
	$d = $ROW1['SalesPrice'];
	
	$searchQ22 = mysqli_query($conn,"SELECT * FROM Customer_13009 WHERE ShopID = $a");
	$row = $searchQ22->fetch_assoc();	
	$name= $row['ShopName'];	

	
	mysqli_query($conn,"INSERT INTO Invoice_13009 VALUES ('',$x,'$name',$b,'$c',$d,$e,($e*$d)) ");
	header('Location:http://localhost/DBProject/invoice.php?id='.$a.'');
   
	
function pri($result2){
if ($result2->num_rows > 0) {
          echo "<div class='container'> 
         <table align='center'>
		
		

 <tr>
	 <th>ShopID</th>
	<th>ShopName</th>
	 <th>ProductCode</th>
	<th>Brand</th>
	 <th>Type</th>
	 <th>Item</th>
	 <th>Size</th>
	 <th>Quantity</th>
	 <th>Price</th>
	 </tr>";
    // output data of each row
    while($row = $searchQ22->fetch_assoc()) {
         echo "<tr>
	     <td>".$row["ShopID"]."</td>
	 <td>".$row["ShopName"]."</td>
	    	    
 <td>".$row["ProductCode"]."</td>
	     <td>".$row["Brand"]."</td>	
	     <td>".$row["Type"]."</td>
	     <td>".$row["Item"]."</td>
	     <td>".$row["Size"]."</td>
	     <td>".$row["Quantity"]."</td>
	     <td>".$row["Price"]."</td>
	 </td>";
	 echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


}}}





?>



<html>

<form action = "" method="post" autocomplete="on"/>
<fieldset>
<legend>INVOICE CRUD</legend>
<p><label class="field" for="ShopID#">ShopID#:<br> <input   type= "text" onfocus="this.value=''" name ="a" /></p></br>
<p><label class="field" for="ProductCode">ProductCode:<br><input  type= "text" name ="b" /></p></br>
<p><label class="field" for="Quantity"> Quantity: <br><input  type= "text" name ="e" /></p></br>

<input type = "submit" name = "INSERT" value ="INSERT" />
<input type = "submit" name = "SEARCH" value ="FIND" />
</fieldset>
</form>


<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
#header{
  background-color: #333333;
  color: white;
  text-transform: uppercase;
  text-align: center;	
  border: none;
}
table{
   position: fixed;
	   top: 50%;
	   left: 50%;
	   transform: translate(-50%,-50%);
}
th, td {
		
    padding: 15px;
    text-align: left;
}
td{
background-color: ffffff;
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}	
body, html{
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
   opacity: 0.80;
}	
</style>

</html>
