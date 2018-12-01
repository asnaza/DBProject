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
	
	$name=($_POST['Name']); 
        $salespersonid=($_POST['SalespersonID']);
        $contactno=($_POST['ContactNo']);
	$customerassigned=($_POST['CustomerAssigned']);
	
    
        $sql = "INSERT INTO Salesperson_13009 (Name,SalespersonID,ContactNo,CustomerAssigned) VALUES
		(?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
 	
	if(!mysqli_stmt_prepare($stmt, $sql)){

	   echo "<div class='alert alert-danger'>Unable to save record.</div>";
		header('location: insert_sp.php');
	}else{

	   mysqli_stmt_bind_param($stmt, "ssss", $name, $salespersonid, $contactno, $customerassigned);
	   mysqli_stmt_execute($stmt);
	   echo "<div class='alert alert-success'>Record was saved.</div>";
	   header('Location: salesperson.php');

	}
 
}

?>
 
<form action="insert_sp.php" method="POST">
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
		<button type = "submit" name="submit" class='btn btn-primary'>Save</button>
                <a href='salesperson.php' class='btn btn-danger'>Back</a>
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
