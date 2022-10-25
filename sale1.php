<head>
    <style>
      table {
                border: 1px solid;
            }
            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
            body {
  margin: 0;
  background-image: url('a.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 15%;
  background-color: #111;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #818181;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
    </style>
<ul>
  <?php
error_reporting(0);
  echo"
  <li><a href='http://localhost/inv1/item1.php'>Item</a></li>
  <li><a href='http://localhost/inv1/client1.php'>Vendor</a></li>
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a class='active' href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";
  $con=mysqli_connect("localhost","root","","bd");//connection
  ?>
</ul>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<center>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h5>Sale's Master</h5>
<form method="POST">
    <?php echo"<button class='btn btn-outline-success' type='submit' name='ok'><a href='http://localhost/inv1/sale.php?n=3'>NEW SALE</a></button>";?>
</form>

<table id="customers">
    <tr>
        <th>SN</th>
        <th>Reciving No</th>
        <th>Reciving Date</th>
        <th>Supplier Name</th>
        <th>Amount</th>
        <th colspan="3">Action</th>
    </tr>

    <?php

    $sql="SELECT * FROM s1 ORDER BY id DESC";//query
    $result=$con->query($sql);
    $no=1;$x=1;$y=2;
    while($row=$result->fetch_assoc())
    {
      echo"
      <tr>
        <td>".$no."</td>
        <td>".$row["rno"]."</td>
        <td>".$row["rdate"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["amt"]."</td>
        <td> <button class='btn btn-outline-danger'><a href='http://localhost/inv1/sale.php?id=$row[id]&n=$x'>Delete</a></button></td>       
        <td> <button class='btn btn-outline-warning'><a href='http://localhost/inv1/sale.php?name=$row[name]&rdate=$row[rdate]&rno=$row[rno]&id=$row[id]&n=$y'>Edit</a></button></td>  
        <td> <button class='btn btn-outline-light'><a href='http://localhost/bd/refresh.php?name=$row[name]&rdate=$row[rdate]&rno=$row[rno]&id=$row[id]&n=7'>View</a></button></td>  
      </tr>
      ";
      $no++;
    }
    ?>
</table>
</div>
</center>