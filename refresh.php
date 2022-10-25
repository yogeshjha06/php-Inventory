<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

</style>

</head>
<body>
<?php
error_reporting(0);

$rno=$_GET['rno'];
$name=$_GET['name'];
$rdate=$_GET['rdate'];
$target=$_GET['n'];
$con=mysqli_connect("localhost","root","","bd");//connection



if($target==6)//purchase
{


    $result=mysqli_query($con,"SELECT `address` , `number` FROM `client` WHERE `name`='$name'");
    $row = mysqli_fetch_array($result);
    $q1 = $row[0];//address
    $q2 = $row[1];//contact

    $des="PURCHASE DETAILS";


    $sql1="SELECT `amt` FROM `p1` WHERE `rno`=$rno";
    $result=mysqli_query($con,$sql1);
    $row = mysqli_fetch_array($result);
    $q3 = $row[0];//address
}
if($target==7)
{
  $q1=$_GET['add'];
  $q2=$_GET['ph'];
  $des="SALE's DETAILS";

    $sql1="SELECT `add`, `ph`, `amt` FROM `s1` WHERE `rno`=$rno";
    $result=mysqli_query($con,$sql1);
    $row = mysqli_fetch_array($result);
    $q1 = $row[0];//address
    $q2 = $row[1];//contact
    $q3 = $row[2];//address
}
?>
<center>
<div id="pricing" class="container-fluid">
      <table class="table table-hover table-dark">
      <tr>
        <th colspan="2"><?php echo$des;?></th>
      </tr>
        <tr>
          <td>Recipt No</td>
          <td><?php echo$rno?></td>         
        </tr>
        <tr>
          <td>Name</td>
          <td><?php echo$name?></td>         
        </tr>
        <tr>
          <td>Date</td>
          <td><?php echo$rdate?></td>         
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo$q1?></td>         
        </tr>
        <tr>
          <td>Phone</td>
          <td><?php echo$q2?></td>         
        </tr>
        <tr>

      </table>
</div>
      </center>

      <div id="pricing" class="container-fluid">
      <table class="table table-hover table-dark">
      <tr>
        <th>Sn</th>
        <th>Item</th>
        <th>Item</th>
        <th>Quntity</th>
        <th>Amount</th>
      </tr>
      

      <?php
      if($target==6)
      {
          $sql="SELECT * FROM p2 WHERE pid = '$rno'";
          $result=$con->query($sql);
          $no=1;
          while($row=$result->fetch_assoc())
          {
            echo"
            <tr>
              <td>".$no."</td>
              <td>".$row["item"]."</td>
              <td>".$row["price"]."</td>
              <td>".$row["qun"]."</td>
              <td>".$row["amt"]."</td>
              </tr>
            ";
            $no++;
          }
       }
       if($target==7)
      {
          $sql="SELECT * FROM s2 WHERE sid = '$rno'";
          $result=$con->query($sql);
          $no=1;
          while($row=$result->fetch_assoc())
          {
            echo"
            <tr>
              <td>".$no."</td>
              <td>".$row["item"]."</td>
              <td>".$row["price"]."</td>
              <td>".$row["qun"]."</td>
              <td>".$row["amt"]."</td>
              </tr>
            ";
            $no++;
          }
       }
      
?>
      </table>
      </div>
      <form method="POST">
      <div id="pricing" class="container-fluid">
      <table class="table table-hover table-dark">
        <tr>
          <th>Total Amount</th>
          <th><?php echo$q3?></th>
        </tr>
        <tr>            
            <td><button style='width:100%' class='btn btn-outline-warning'name="no" type="submit">BACK</button></td>
            <td><input style='width:100%' class='btn btn-outline-success' name="ok" value="PRINT" type="button" onclick="window.print()" /></td>
        </tr>
      </table>
      </div>
      </form>

      <?php

      if($target==6)
      {

            if(isset($_POST['no']))
            {
              header("location: http://localhost/inv1/pur1.php"); 
            }
      }
      if($target==7)
      {

            if(isset($_POST['no']))
            {
              header("location: http://localhost/inv1/sale1.php"); 
            }
      }
      ?>

</body>