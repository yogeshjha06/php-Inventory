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

input[type=text], input[type=password] {
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
  <li><a class="active" href="http://localhost/inv/home.php">Back</a></li>
</ul>


<form action="http://localhost/inv/edit.php" method="post">


  <div class="container">
    <table class="center">
        <tr>
            <td><label for="brand">Brand Name</label></td>
            <td><input type="text" placeholder="Enter Brand Name" name="brand" required ></td>


    </tr>

    <td colspan="2"><button type="submit" name="submit">Change</button></td>

    </table>
  </div>


</form>





<?php
    

    $server="localhost";
    $username="root";
    $password="";
    $dbname="brand";
    $brand=$_POST["brand"];

    

    $con=mysqli_connect($server,$username,$password,$dbname);
        if(isset($_POST['submit']))
        {
          $query="UPDATE `brand` SET `brand`='$brand' WHERE id=$_GET[id]";
          $run=$con->query($query);
            if ($con->connect_error) 
            {
              die("Connection failed: " . $con->connect_error);
            } 
            else if($run)
                    echo"brand changed";
            else
                    echo"error";
        }
?>


</body>
</html>