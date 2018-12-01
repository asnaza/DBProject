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
	
	$productcode=($_POST['ProdutCode']); 
        $brand=($_POST['Brand']);
        $type=($_POST['Type']);
        $shade=($_POST['Shade']);
	$size=($_POST['Size']);
	$salesprice=($_POST['SalesPrice']);
	
    
        $sql = "INSERT INTO Product_13009 (ProdutCode,Brand,Type,Shade,Size,SalesPrice) VALUES
		(?,?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
 	
	if(!mysqli_stmt_prepare($stmt, $sql)){

	   echo "<div class='alert alert-danger'>Unable to save record.</div>";
		header('location: insert_p.php');
	}else{

	   mysqli_stmt_bind_param($stmt, "issssi", $productcode, $brand, $type, $shade, $size, $salesprice);
	   mysqli_stmt_execute($stmt);
	   echo "<div class='alert alert-success'>Record was saved.</div>";
	   header('Location: product.php');

	}
 
}

?>
 
<form action="insert_p.php" method="POST">
    <table class='table table-hover table-responsive table-bordered'>
	<tr>
            <td>Product Code</td>
            <td><input type='text' name='ProdutCode' class='form-control' /></td>
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
		<button type = "submit" name="submit" class='btn btn-primary'>Save</button>
                <a href='product.php' class='btn btn-danger'>Back</a>
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
