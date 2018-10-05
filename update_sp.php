<!DOCTYPE HTML>
<html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1 style="color: white; text-transform: uppercase; font-weight: bold;">Update Information</h1>
        </div>
     
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
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
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM Salesperson_13009 WHERE SalespersonID = ?";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $name = $row['Name'];
    $salespersonid = $row['SalespersonID'];
    $contactno = $row['ContactNo'];
    $customerassigned = $row['CustomerAssigned'];
    
    
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
<?php	
if($_POST){
     
    try{
     
        // write update query
        // in this case, it seemed like we have so many fields to pass and 
        // it is better to label them and not use question marks
        $query = "UPDATE Salesperson_13009
                    SET Name=:Name, ContactNo=:ContactNo, CustomerAssigned=:CustomerAssigned 
                    WHERE SalespersonID = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
         
        $name=htmlspecialchars(strip_tags($_POST['Name']));
        $contactno=htmlspecialchars(strip_tags($_POST['ContactNo']));
        $customerassigned=htmlspecialchars(strip_tags($_POST['CustomerAssigned']));
	
 
	$stmt->bindParam(':Name', $name);
        $stmt->bindParam(':Contactno', $contactno);
        $stmt->bindParam(':CustomerAssigned', $customerassigned);
	$stmt->bindParam(':id', $id);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }
         
    }
     
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='Name' value="<?php echo htmlspecialchars($password, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Contact No</td>
            <td><input type='text' name='ContactNo' value="<?php echo htmlspecialchars($active, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Customer Assigned</td>	
            <td><input type='text' name='CustomerAssigned' value="<?php echo htmlspecialchars($salesperson, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
	
	
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='salesperson.php' class='btn btn-success'>Back</a>
            </td>
        </tr>
    </table>
</form>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
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
