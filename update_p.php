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
    $query = "SELECT * FROM Product_13009 WHERE ShopID = ?";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $productcode = $row['ProductCode'];
    $brand = $row['Brand'];
    $type = $row['Type'];
    $shade = $row['Shade'];
    $size = $row['Size'];
    $salesprice = $row['SalesPrice'];
    
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
        $query = "UPDATE Product_13009
                    SET Brand=:Brand, Type=:Type, Shade=:Shade, Size=:Size, SalesPrice=:SalesPrice
                    WHERE ProductCode = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
         
        $brand=htmlspecialchars(strip_tags($_POST['Brand']));
        $type=htmlspecialchars(strip_tags($_POST['Type']));
        $shade=htmlspecialchars(strip_tags($_POST['Shade']));
	$size=htmlspecialchars(strip_tags($_POST['Size']));
	$salesprice=htmlspecialchars(strip_tags($_POST['SalesPrice']));
	
 
	$stmt->bindParam(':Brand', $brand);
        $stmt->bindParam(':Type', $type);
        $stmt->bindParam(':Shade', $shade);
	$stmt->bindParam(':Size', $size);
	$stmt->bindParam(':SalesPrice', $salesprice);
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
            <td>Brand</td>
            <td><input type='text' name='Brand' value="<?php echo htmlspecialchars($brand, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type='text' name='Type' value="<?php echo htmlspecialchars($type, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Shade</td>	
            <td><input type='text' name='Shade' value="<?php echo htmlspecialchars($shade, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
	<tr>
            <td>Size</td>
            <td><input type='text' name='Size' value="<?php echo htmlspecialchars($size, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
	<tr>
            <td>Sales Price</td>
            <td><input type='text' name='SalesPrice' value="<?php echo htmlspecialchars($salesprice, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
	
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='product.php' class='btn btn-success'>Back</a>
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
