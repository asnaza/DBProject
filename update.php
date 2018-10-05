<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1 style="color: white; text-transform: uppercase; font-weight: bold;">Update Product</h1>
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
    $query = "SELECT * FROM Customer_13009 WHERE ShopID = ?";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $shopid = $row['ShopID'];
    $shop_name = $row['ShopName'];
    $contactperson = $row['ContactPerson'];
    $contactnumber = $row['ContactNo'];
    $area = $row['Area'];
    $address = $row['Address'];
    $coordinates = $row['Coordinates'];
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
        $query = "UPDATE Customer_13009
                    SET ShopName=:ShopName, ContactPerson=:ContactPerson, ContactNo=:ContactNo, Area=:Area, Address=:Address, Coordinates=:Coordinates
                    WHERE ShopID = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
         
        $shopname=htmlspecialchars(strip_tags($_POST['ShopName']));
        $contactperson=htmlspecialchars(strip_tags($_POST['ContactPerson']));
        $contactno=htmlspecialchars(strip_tags($_POST['ContactNo']));
	$area=htmlspecialchars(strip_tags($_POST['Area']));
	$address=htmlspecialchars(strip_tags($_POST['Address']));
	$coordinates=htmlspecialchars(strip_tags($_POST['Coordinates']));
 
	$stmt->bindParam(':ShopName', $shopname);
        $stmt->bindParam(':ContactPerson', $contactperson);
        $stmt->bindParam(':ContactNo', $contactno);
	$stmt->bindParam(':Area', $area);
	$stmt->bindParam(':Address', $address);
	$stmt->bindParam(':Coordinates', $coordinates);
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
            <td>ShopName</td>
            <td><input type='text' name='ShopName' value="<?php echo htmlspecialchars($shopname, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>ContactPerson</td>
            <td><input type='text' name='ContactPerson' value="<?php echo htmlspecialchars($contactperson, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>ContactNo</td>	
            <td><input type='text' name='ContactNo' value="<?php echo htmlspecialchars($contactno, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
	<tr>
            <td>Area</td>
            <td><input type='text' name='Area' value="<?php echo htmlspecialchars($area, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
	<tr>
            <td>Address</td>
            <td><input type='text' name='Address' value="<?php echo htmlspecialchars($address, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
	<tr>
            <td>Coordinates</td>
            <td><input type='text' name='Coordinates' value="<?php echo htmlspecialchars($coordinates, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='CreateTable.php' class='btn btn-success'>Back</a>
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
