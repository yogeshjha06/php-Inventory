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
h3{
  margin: 0;
  padding: 0;
  position: auto;
  background-color: #04AA6D;
}

        

    </style>
<ul>
  <?php
error_reporting(0);
  echo"
  <li><a href='http://localhost/inv1/item1.php'>Item</a></li>
  <li><a href='http://localhost/inv1/client1.php'>Vendor</a></li>
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a class='active' href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";
  ?>
</ul>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">

<center>
<h3>MASTER REPORT</h3>
<input class='btn btn-outline-success' value="Downlode Report" type="button" onclick="window.print()" />
<h5 >Purchase Report</h5>
<form>
  <table id="customers">
    <tr>
      <th>SN</th>
      <th>Recipit No</th>
      <th>Date</th>
      <th>Quantity</th>
      <th>Item</th>
      <th>Amount</th>
    </tr>

    <?php
    
    $con=mysqli_connect("localhost","root","","bd");//connection
    $sql="SELECT a.rno, a.rdate, b.item, b.amt, b.qun FROM p1 a INNER JOIN p2 b ON a.rno=b.pid";//query
    $result=$con->query($sql);
    $no=1;
    while($row=$result->fetch_assoc())
    {
      echo"
      <tr>
        <td>".$no."</td>
        <td>".$row["rno"]."</td>
        <td>".$row["rdate"]."</td>
        <td>".$row["qun"]."</td>
        <td>".$row["item"]."</td>
        <td>".$row["amt"]."</td>
      </tr>
      ";
      $no++;
    }
    ?>
  </table>
</form>


<h5 >Sale Report</h5>
<form>
  <table id="customers">
    <tr>
      <th>SN</th>
      <th>Recipit No</th>
      <th>Date</th>
      <th>Quantity</th>
      <th>Item</th>
      <th>Amount</th>
    </tr>

    <?php
    
    $con=mysqli_connect("localhost","root","","bd");//connection
    $sql="SELECT a.rno, a.rdate, b.item, b.amt, b.qun FROM s1 a INNER JOIN s2 b ON a.rno=b.sid";//query
    $result=$con->query($sql);
    $no=1;
    while($row=$result->fetch_assoc())
    {
      echo"
      <tr>
        <td>".$no."</td>
        <td>".$row["rno"]."</td>
        <td>".$row["rdate"]."</td>
        <td>".$row["qun"]."</td>
        <td>".$row["item"]."</td>
        <td>".$row["amt"]."</td>
      </tr>
      ";
      $no++;
    }
    ?>
  </table>
  </form>



<form method="POST">
  <button id="stock" class='btn btn-outline-success' type="submit" name="stock" >STOCK REPORT</button>
</form>
<?php

if(isset($_POST['stock']))
{

  echo"
  <script type='text/javascript'>
  document.getElementById('stock').style.display = 'none';

  </script>
  ";



  //////////////////////////
 


  //////////////////////////

        echo"
      <h5 >Stock Report</h5>
      <form>
        <table id='customers'>
          <tr>
            <th>SN</th>
            <th>Item</th>
            <th>Quantity</th>
          </tr>";


          
          $con=mysqli_connect("localhost","root","","bd");//connection
          $sql="SELECT * FROM `item` WHERE `status`=1 ";//query
          $result=$con->query($sql);
          $no=1;
          while($row=$result->fetch_assoc())
          {
            echo"
            <tr>
              <td>".$no."</td>
              <td>".$row["item"]."</td>
              <td>".$row["qun"]."</td>
            </tr>
            ";
            $no++;
          }

  }
?>
</table>


<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>MASTER REPORT!</strong> This document contain full report of inventry managment system.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


</center>
</div>
</body>


