<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<body>
<div class="container">
<div class="page-header">
	<h1 style="color: white; text-transform: uppercase; font-weight: bold;">Insert Data</h1>
</div>
      
<?php
$host = "localhost";
$db_name = "AsnaTable";
$username = "asna";
$password = "asna";
  
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}

if($_POST){
    try{
        $query = "INSERT INTO Customer_13009 SET ShopID=:ShopID,ShopName=:ShopName, ContactPerson=:ContactPerson, ContactNo=:ContactNo, Area=:Area, Address=:Address, Coordinates=:Coordinates";
 
        $stmt = $con->prepare($query);

	$shopid=htmlspecialchars(strip_tags($_POST['ShopID'])); 
        $shopname=htmlspecialchars(strip_tags($_POST['ShopName']));
        $contactperson=htmlspecialchars(strip_tags($_POST['ContactPerson']));
        $contactno=htmlspecialchars(strip_tags($_POST['ContactNo']));
	$area=htmlspecialchars(strip_tags($_POST['Area']));
	$address=htmlspecialchars(strip_tags($_POST['Address']));
	$coordinates=htmlspecialchars(strip_tags($_POST['Coordinates']));
 
        $stmt->bindParam(':ShopID', $shopid);
	$stmt->bindParam(':ShopName', $shopname);
        $stmt->bindParam(':ContactPerson', $contactperson);
        $stmt->bindParam(':ContactNo', $contactno);
	$stmt->bindParam(':Area', $address);
	$stmt->bindParam(':Address', $area);
	$stmt->bindParam(':Coordinates', $coordinates);
                  
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
                <input type='submit' value='Save' class='btn btn-primary' />
		<a href='CreateTable.php' class='btn btn-danger'>Back</a>
            </td>
        </tr>
    </table>
</form>
          
</div>
      
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
