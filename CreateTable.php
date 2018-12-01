
<?php
//Connecting DB
include_once 'config.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
    <link rel="stylesheet" href="style.css">
</head>

 <body>
 <style>
.navbar-default {
    background-color: #dcdcdc;
    border-color: #E7E7E7;
}
 </style>
   <nav class="navbar navbar-expand-lg navbar-default ">
                <a class="navbar-brand" href="#" style= "text-transform: uppercase; font-weight: bold; margin-bottom: 4px;">Paint Shop</a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="insert.php" >Create<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="welcome.php">Home</a>
                    </li>
                    
		    <form action='logout.php'>
			<input type="submit" value="Logout" style="background-color: #dcdcdc; border: none; color: blue; margin-top: 8px;">
		    </form>
                  </ul>
                </div>
              </nav>
<!-- 
<div class='container'>

        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />

        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
    </div> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
 </body>
</html> 


<?php




$sql = "SELECT * FROM Customer_13009;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    echo '<table >
	 <tr id="header">
	 <th>Shop ID</th>
	 <th>Shop Name</th>
	 <th>Contact Person</th>
	 <th>Contact No</th>
	 <th>Area</th>
	 <th>Address</th>
	 <th>Coordinates</th>
	 <th>Edit/Delete</th>
	 </tr>';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
	     <td>".$row["ShopID"]."</td>
	     <td>".$row["ShopName"]."</td>
	     <td>".$row["ContactPerson"]."</td>
	     <td>".$row["ContactNo"]."</td>
	     <td>".$row["Area"]."</td>
	     <td>".$row["Address"]."</td>
	     <td>".$row["Coordinates"]."</td>";  
	echo "<td>";
            // we will use this links on next part of this post
	    echo "<a href='invoice.php?ShopID={$row["ShopID"]}' class='btn btn-success m-r-1em'>Invoice</a>";
            echo "<a href='update.php?id={$row["ShopID"]}' class='btn btn-primary m-r-1em'>Edit</a>";
 	echo " ";
            // we will use this links on next part of this post
            echo "<a href='delete.php?id={$row['ShopID']}'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
	 echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?> 
<html>
<body>
<div class="navbar"></div>

<table style="width:100%">
</table>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	
}
#header{
  background-color: #333333;
  color: white;
  text-transform: uppercase;
  text-align: center;	
  border: none;
}
table{
   position: fixed;
	   top: 56%;
	   left: 50%;
	   transform: translate(-50%,-50%);

}
th, td {
		
    padding: 15px;
    text-align: left;
}
td{
background-color: ffffff;
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;

}	
body, html{
 height: 100%;
    background-image: url('bgphp.jpg');
    background-repeat: no-repeat;
    background-size: cover;
   

}
.container{
    display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  justify-content: space-between;
}
.btn{
   opacity: 0.80;
}
::-webkit-scrollbar{
	width: 10px;
}
::-webkit-scrollbar-track{
	background: #f1f1f1;
}
::-webkit-scrollbar-thumb{
	background: #888;
}
::-webkit-scrollbar-thumb-hover{
	background: #555;
}
</style>
<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    } 
}
</script>
</body>
</html>


