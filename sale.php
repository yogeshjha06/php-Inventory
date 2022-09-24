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
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}


</style>
</head>
<body>

<div class="header">
</div>
<ul>
  <li><a href="http://localhost/inv/home.php">Brand Master</a></li>
  <li><a href="http://localhost/inv/item.php">Item Master</a></li>
  <li><a href="http://localhost/inv/client.php">Client Master</a></li>
  <li><a href="http://localhost/inv/purchase.php">Purchase</a></li>
  <li><a class="active" href="http://localhost/inv/sale.php">Sale</a></li>
  <li><a href="http://localhost/inv/report.php">Report</a></li>
</ul>




<table id="customers">
  <tr>
    <th>ID</th>
    <th>Client</th>
    <th>Item</th>
    <th>Amount</th>
    <th colspan="2">CURD</th>
  </tr>
  <?php

      $server="localhost";
      $username="root";
      $password="";
      $dbname="brand";

      $con=mysqli_connect($server,$username,$password,$dbname);

      if($con->connect_error)
      {
        die("Connection Failed: ".$con->connect_error);
      }

      $sql="SELECT * FROM sale";
      $result=$con->query($sql);

      if(!$result)
      {
        die("Invalid QUery".$con->error);
      }
      while($row=$result->fetch_assoc())
      {
        echo"
        <tr>
          <td>".$row["id"]."</td>
          <td>".$row["client"]."</td>
          <td>".$row["item"]."</td>          
          <td>".$row["amount"]."</td>
          <td> <button><a href=''>Delete</a></button></td>       
          <td> <button><a href=''>Edit</a></button></td>  
        </tr>";

      }

      
      
      


?>
</table>

<button><a href="http://localhost/inv/sale1.php">Buy From Stock</a></button>



</body>
</html>