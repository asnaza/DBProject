<?php

include('config.php');
 $a=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
    // delete query
	
	$insert = $conn->query("SELECT * FROM Invoice_13009 WHERE SNo=$a");
	$x1= $insert->fetch_assoc();
	$c=$x1['ShopID'];    	
	mysqli_query($conn,"DELETE FROM Invoice_13009 WHERE SNo=$a");
	header('Location:http://localhost/DBProject/invoice.php?id='.$c.'');
   


?>
