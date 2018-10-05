<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<body>
<div class="container">
<div class="page-header">
	<h1 style="color: white; text-transform: uppercase; font-weight: bold;">Insert Information</h1>
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
        $query = "INSERT INTO Salesperson_13009 SET Name=:Name,SalespersonID=:SalespersonID,ContactNo=:ContactNo, CustomerAssigned=:CustomerAssigned";
 
        $stmt = $con->prepare($query);

	$name=htmlspecialchars(strip_tags($_POST['Name']));
        $salespersonid=htmlspecialchars(strip_tags($_POST['SalespersonID']));
        $contactno=htmlspecialchars(strip_tags($_POST['ContactNo']));
	$customerassigned=htmlspecialchars(strip_tags($_POST['CustomerAssigned']));
	
        
	$stmt->bindParam(':Name', $name);
        $stmt->bindParam(':SalespersonID', $salespersonid);
        $stmt->bindParam(':ContactNo', $contactno);
	$stmt->bindParam(':CustomerAssigned', $customerassigned);
	
                  
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
            <td>Name</td>
            <td><input type='text' name='Name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Salesperson ID</td>
            <td><input type='text' name='SalespersonID' class='form-control' /></td>
        </tr>
        <tr>
            <td>Contact Number</td>
            <td><input type='text' name='ContactNo' class='form-control' /></td>
        </tr>
	<tr>
            <td>Customer Assigned</td>
            <td><input type='text' name='CustomerAssigned' class='form-control' /></td>
        </tr>
	
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
		<a href='salesperson.php' class='btn btn-danger'>Back</a>
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
