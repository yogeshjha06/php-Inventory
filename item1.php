<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-size: 18px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}

input[type=text], input[type=password], select {
  width: 30;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}


img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
table.center {
  margin-left: auto; 
  margin-right: auto;
}
</style>
</head>
<body>

<div class="header">
</div>
<ul>

  <li><a class="active" href="http://localhost/inv/item.php">Back</a></li>
 
</ul>


<?php

$hostname="localhost";
$username="root";
$password="";
$databaseName="brand";
$connect= "SELECT * FROM `brand`";
$query=mysqli_connect($hostname,$username,$password,$databaseName);
$result1=mysqli_query($query,$connect);

?>

<form action="http://localhost/inv/item1.php" method="post">


  <div class="container">
    <table class="center">
    <tr>
    <td><label for="brand">Brand Name</label></td>
    <td>
        <select name="brand" id="brand">
            <?php while ($row1=mysqli_fetch_array($result1)):; ?>
            <option value="<?php echo$row1[0];?>"><?php echo$row1[1];?></option>
            <?php endwhile;?>
        </select>
    </td>
    </tr>


    <br>
    <tr>

    <td><label for="item">Item Name</label></td>
    <td><input type="text" placeholder="Enter item Name" name="item" required ></td>
    </tr>


    <br>
    <tr>

    <td><label for="price">Price</label></td>
    <td><input type="text" placeholder="Enter price" name="price" required ></td>

    </tr>
    <tr>

    <td colspan="2"><button type="submit" name="submit">Add Item</button></td>
    </tr>

    </table>
  </div>


</form>





<?php
$server="localhost";
$username="root";
$password="";
$dbname="brand";

$con=mysqli_connect($server,$username,$password,$dbname);
if(isset($_POST['submit']))
{
  if(!empty($_POST['brand']))
  {
    $brand=filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
   
    $item=$_POST['item'];
    $price=$_POST['price'];


    $query="INSERT INTO `item` (`brand`, `item`, `price`) VALUES ('$brand','$item', '$price');";
    $run=mysqli_query($con,$query);
      
    if($run)
        echo"Client added";
    else
        echo"error: client not added!";

  }
  else
    echo"INVALID ENTRY";
}



?>


</body>
</html>