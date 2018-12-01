<?php
  include_once 'config.php';
?>
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<body>
<div class="container">
<div class="page-header">
	<h1 style="color: white; text-transform: uppercase; font-weight: bold;">Insert Data</h1>
</div>
      
<?php


if(isset($_POST['submit'])){
	
	$shopid=($_POST['ShopID']); 
        $shopname=($_POST['ShopName']);
        $contactperson=($_POST['ContactPerson']);
        $contactno=($_POST['ContactNo']);
	$area=($_POST['Area']);
	$address=($_POST['Address']);
	$coordinates=($_POST['Coordinates']);
    
        $sql = "INSERT INTO Customer_13009 (ShopID,ShopName,ContactPerson,ContactNo,Area,Address,Coordinates) VALUES
		(?,?,?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
 	
	if(!mysqli_stmt_prepare($stmt, $sql)){

	   echo "<div class='alert alert-danger'>Unable to save record.</div>";
		header('location: insert.php');
	}else{

	   mysqli_stmt_bind_param($stmt, "sssssss", $shopid, $shopname, $contactperson, $contactno, $area, $address, $coordinates);
	   mysqli_stmt_execute($stmt);
	   echo "<div class='alert alert-success'>Record was saved.</div>";
	   header('Location: CreateTable.php');

	}
 
}

?>
 
<form action="insert.php" method="POST">
    <table class='table table-hover table-responsive table-bordered'>
	<tr>
            <td>Shop ID</td>
            <td><input type='text' name='ShopID' class='form-control' /></td>
        </tr>
        <tr>
            <td>Shop Name</td>
            <td><input type='text' name='ShopName' class='form-control' /></td>
        </tr>
        <tr>
            <td>Contact Person</td>
            <td><input type='text' name='ContactPerson' class='form-control' /></td>
        </tr>
        <tr>
            <td>Contact Number</td>
            <td><input type='text' name='ContactNo' class='form-control' /></td>
        </tr>
	<tr>
            <td>Area</td>
            <td><input type='text' name='Area' class='form-control' /></td>
        </tr>
	<tr>
            <td>Address</td>
            <td><input type='text' name='Address' class='form-control' /></td>
        </tr>
	<tr>
            <td>Coordinates</td>
            <td><input type='text' name='Coordinates' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
		<button type = "submit" name="submit" class='btn btn-primary'>Save</button>
                <a href='CreateTable.php' class='btn btn-danger'>Back</a>
            </td>
        </tr>
    </table>
</form>
          
</div>
      

<style>
body, html{
 height: 100%;
    background-image: url('bgphp.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    
}
table{ 
   border-color: black;
   background-color: white;
   font-weight: bold
}
</style>    
</body>
</html>
