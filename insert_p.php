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
        $query = "INSERT INTO Product_13009 SET ProductCode=:ProductCode,Brand=:Brand, Type=:Type, Shade=:Shade, Size=:Size, SalesPrice=:SalesPrice";
 
        $stmt = $con->prepare($query);

	$productcode=htmlspecialchars(strip_tags($_POST['ProductCode'])); 
        $brand=htmlspecialchars(strip_tags($_POST['Brand']));
        $type=htmlspecialchars(strip_tags($_POST['Type']));
        $shade=htmlspecialchars(strip_tags($_POST['Shade']));
	$size=htmlspecialchars(strip_tags($_POST['Size']));
	$salesprice=htmlspecialchars(strip_tags($_POST['SalesPrice']));
	
 
        $stmt->bindParam(':ProductCode', $productcode);
	$stmt->bindParam(':Brand', $brand);
        $stmt->bindParam(':Type', $type);
        $stmt->bindParam(':Shade', $shade);
	$stmt->bindParam(':Size', $size);
	$stmt->bindParam(':SalesPrice', $salesprice);
	
                  
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
            <td>Product ID</td>
            <td><input type='text' name='ProductCode' class='form-control' /></td>
        </tr>
        <tr>
            <td>Brand</td>
            <td><input type='text' name='Brand' class='form-control' /></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type='text' name='Type' class='form-control' /></td>
        </tr>
        <tr>
            <td>Shade</td>
            <td><input type='text' name='Shade' class='form-control' /></td>
        </tr>
	<tr>
            <td>Size</td>
            <td><input type='text' name='Size' class='form-control' /></td>
        </tr>
	<tr>
            <td>Sales Price</td>
            <td><input type='text' name='SalesPrice' class='form-control' /></td>
        </tr>
	
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
		<a href='product.php' class='btn btn-danger'>Back</a>
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
