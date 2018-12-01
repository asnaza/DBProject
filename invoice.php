<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
</html>

<?php
include_once 'config.php';

$a=isset($_GET['ShopID']) ? $_GET['ShopID'] : die('ERROR: Record ID not found.');

$searchQ = mysqli_query($conn,"SELECT * FROM Customer_13009 WHERE ShopID = $a");
	pr($searchQ);
function pr($result2){

if ($result2->num_rows > 0) {
          echo '<div class="container"> 
         <table align="center">
	<h3 align="center" id="title">INVOICE HEADER</h3>	
		
	
 	<tr id="header">
	 <th>Customer ID</th>
	 <th>Name</th>
	 <th>Contact name</th>
	 <th>ContactNumber</th>
	 <th>Area</th>
	 <th>Address</th>
	 <th>Coordinates</th>
	 <th>Action</th>
	 </tr>';
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
            echo "<a href='CreateTable.php' class='btn btn-primary'>BACK</a>";
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
	<br>
	<br>
	<h3 align="center" id="title"> INVOICE </h3>	
		
	
 	<tr id="header">
	 <th>ShopID</th>
	 <th>Date</th>
	 <th>SalespersonID</th>
	 <th>Brand</th>
	 <th>ProductCode</th>
	 <th>Quantity</th>
	 <th>Rate</th>
	 <th>Price</th>
	 <th>ACTION</th>
	 </tr>';
    // output data of each row
    while($row = $searchQ22->fetch_assoc()) {
	      
 echo "<tr>
	     <td>".$row["ShopID"]."</td>
	     <td>".$row["Date"]."</td>
	     <td>".$row["SalespersonID"]."</td>
	     <td>".$row["Brand"]."</td>
	     <td>".$row["ProductCode"]."</td>
	     <td>".$row["Quantity"]."</td>
	     <td>".$row["Rate"]."</td>
	       <td>".$row["Price"]."</td>";  
	echo "<td>";
            // we will use this links on next part of this post
            echo "<a href='invoice_u.php?id={$row["SNo"]}' class='btn btn-primary m-r-1em'>Edit</a>";
 	echo " ";
            // we will use this links on next part of this post
            echo "<a href='invoice_d.php?id={$row["SNo"]}'  class='btn btn-primary m-r-1em'>Delete</a>";echo "</td>";
	 echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
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
	$pp= date("d-m-y");
	$searchQ22 = mysqli_query($conn,"SELECT * FROM Customer_13009 WHERE ShopID = $a");
	$row = $searchQ22->fetch_assoc();	
	$name= $row['ShopName'];	

	
	mysqli_query($conn,"INSERT INTO Invoice_13009 VALUES ('',$x,'$name',$b,'$pp','$c',$d,$e,($e*$d)) ");
	header('Location:invoice.php?id='.$a.'');
   
	
function pri($result2){
if ($result2->num_rows > 0) {
          echo "<div class='container'> 
         <table align='center'>
		
		

 <tr>
	 <th>ShopID</th>
	 <th>Date</th>
	 <th>SalespersonID</th>
	 <th>Brand</th>
	 <th>ProductCode</th>
	 <th>Quantity</th>
	 <th>Rate</th>
	 <th>PriceT</th>
	 </tr>";
    // output data of each row
    while($row = $searchQ22->fetch_assoc()) {
         echo "<tr>
	     <td>".$row["ShopID"]."</td>
	     <td>".$row["Date"]."</td>
	     <td>".$row["SalespersonID"]."</td>
	     <td>".$row["Brand"]."</td>	
	     <td>".$row["ProductCode"]."</td>
	     <td>".$row["Quantity"]."</td>
	     <td>".$row["Rate"]."</td>
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
<br>
<br>
<form action = "" method="post" autocomplete="on" align='center'/>
<fieldset>
<br>
<legend align='center' id='title'>ENTER NEW DATA</legend>
<p><label class="field" for="ShopID"><input   type= "text" onfocus="this.value=''" name ="a" placeholder='CustomerID'/></p>
<p><label class="field" for="ProductCode"><input  type= "text" name ="b"  placeholder='ProductCode'/></p>
<p><label class="field" for="Quantity"><input  type= "text" name ="e" placeholder='Quantity'/></p>
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
.btn{
   opacity: 0.80;
}
::-webkit-scrollbar{
	width: 10px;
}
::-webkit-scrollbar-track{
	background: #f1f1f1;
}
::-webkit-scrollbar-thumb{
	background: #888;
}
::-webkit-scrollbar-thumb-hover{
	background: #555;
}
#title{
	
	font-weight: bold;
	color: #ffffff;
}

</style>
</html>
