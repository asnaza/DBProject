<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<body>
<div class="container">
<div class="page-header">
	<h1 style="color: white; text-transform: uppercase; font-weight: bold;">Create Account</h1>
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
        $query = "INSERT INTO Users_13009 SET UserID=:UserID,Password=:Password, Active=:Active, Salesperson=:Salesperson";
 
        $stmt = $con->prepare($query);

	$UserID=htmlspecialchars(strip_tags($_POST['UserID'])); 
        $Password=htmlspecialchars(strip_tags($_POST['Password']));
        $Active=htmlspecialchars(strip_tags($_POST['Active']));
        $Salesperson=htmlspecialchars(strip_tags($_POST['Salesperson']));
 
        $stmt->bindParam(':UserID', $UserID);
	$stmt->bindParam(':Password', $Password);
        $stmt->bindParam(':Active', $Active);
        $stmt->bindParam(':Salesperson', $Salesperson);
                  
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
            <td>User ID</td>
            <td><input type='text' name='UserID' class='form-control' /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='text' name='Password' class='form-control' /></td>
        </tr>
        <tr>
            <td>Active</td>
            <td><input type='text' name='Active' class='form-control' /></td>
        </tr>
        <tr>
	<td>Sales Person</td>
	<td>
	<?php
	$stmt = $con->prepare("select Name from Salesperson_13009");
	$stmt->execute();
    	echo "<select name='Name' class='form-control'>";
	echo '<option value="">None</option>';
    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                  echo '<option value="'.$row["Name"].'">'.$row["Name"].'</option>';                
	}
    	echo "</select>";
	?>
	</td>
	</tr>	
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
		<a href='users.php' class='btn btn-danger'>Back</a>
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
