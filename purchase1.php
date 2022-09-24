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

  <li><a class="active" href="http://localhost/inv/purchase.php">Back</a></li>

</ul>




<form action="http://localhost/inv/purchase1.php" method="post">


  <div class="container">
    <table class="center">
   
    <tr>

    <td><label for="client">Client Id</label></td>
    <td><input type="text" placeholder="Enter client id" name="client" required ></td>
    </tr>


    <br>
    <tr>

    <td><label for="item">Item</label></td>
    <td><input type="text" placeholder="Phone number" name="item" required ></td>

    </tr>
    <tr>

    <td><label for="number">Quantity</label></td>
    <td><input type="text" placeholder="Phone number" name="number" required ></td>

    </tr>
    <tr>

    <td colspan="2"><button type="submit" name="submit">Buy Item</button></td>
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
  if(!empty($_POST['client']))
  {
    $id=$_POST['client'];
    $item=$_POST['item'];
    $num=$_POST['number'];


    $query="INSERT INTO `purchase` (`client`, `item`, `amount`) VALUES ('$id', '$item', '$num');";
    $run=mysqli_query($con,$query);
      
    if($run)
        echo"item baught!";
    else
        echo"error: item not added!";

  }
  else
    echo"INVALID ENTRY";
}


?>


</body>
</html>