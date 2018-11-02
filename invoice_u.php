<?php
include('config.php');

$a=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
$Serial=$a;
$IsearchQ = mysqli_query($conn,"SELECT * FROM Invoice_13009 WHERE SNo = $a");
if ($IsearchQ->num_rows > 0){

$rowX = $IsearchQ->fetch_assoc();
$aaa = $rowX["ShopID"];

$searchQ = mysqli_query($conn,"SELECT * FROM Customer_13009 WHERE ShopID = $aaa");
	pr($searchQ);}
function pr($result2){
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



$searchQ22 = mysqli_query($conn,"SELECT * FROM Invoice_13009 WHERE SNo = $Serial");
if ($searchQ22->num_rows > 0){

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
	 <th>Edit/Delete</th>
	 </tr>";
    // output data of each row
    while($row = $searchQ22->fetch_assoc()) {
$productID=$row["ProductCode"];
$QTyy=$row["Quantity"];
	      
 echo "<tr>
	     <td>".$row["ShopID"]."</td>
	     <td>".$row["ShopName"]."</td>
	     <td>".$row["ProductCode"]."</td>
	     <td>".$row["Brand"]."</td>
	     <td>".$row["Type"]."</td>
	     <td>".$row["Item"]."</td>
	     <td>".$row["Size"]."</td>
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
    echo "0 results";
}


 if(isset($_POST['UPDATE'])){

	
	$b1 = $_POST['b'];
	$c1 = $_POST['c'];
	

mysqli_query($conn,"UPDATE Invoice_13009 SET ProductCode=$b1, Quantity=$c1 WHERE SNo=$Serial ");
header('Location:http://localhost/DBProject/invoice.php?id='.$aaa.'');
		 
}





?>
<html>

<form action = "" method="post" autocomplete="on"/>
<fieldset>
<legend>Customer CRUD</legend>
<p><label class="field" for="ShopID#">ShopID#:<br> <input   type= "text" name ="a" value= <?php echo $aaa; ?> /></p></br>
<p><label class="field" for="ProductCode">ProductCode: <br><input type= "text" name ="b" value=<?php echo $productID; ?> ></p></br>
<p><label class="field" for="Quantity"> Quantity:<br> <input type= "text" name ="c" value= <?php echo $QTyy; ?>></p></br>



<input type = "submit" name = "UPDATE" value ="UPDATE" />
</fieldset>
</form>
<html>
<style>
fieldset{
	width:500px;
}
fieldset P{
	clear :both;
	padding: 5px;
}
legend{
	font-size: 20px;
}
label.field{
	text-align: right;
	width: 100px;
	
	font-weight : bold;

}
form {
  text-align: center;
}
html,body{
height:100%;
width:100%;
}
body{
    background-color: lightgrey;
background-image: url('bgphp.jpg');
    background-repeat: no-repeat;
    background-size: cover;}
.container{
margin-top: 10%;
}
table, th{
    border: 1px solid black;
    
}
tr:hover {background-color: #FBEFF5;}
td{
    border: 0px solid black;
}
th, td {
		
    padding: 5px;
    text-align: center;
}
tr:nth-child(even) {background-color: #f2f2f2;}
td{
background-color: ECE0F8;
}
th{
background-color: FBEFF5;
}


</style>
</html>

</html>
