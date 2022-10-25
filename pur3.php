<head>
    <style>
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
    </style>
<ul>
  <?php

  echo"
  <li><a href='http://localhost/inv1/item1.php'>Item</a></li>
  <li><a href='http://localhost/inv1/client1.php'>Vendor</a></li>
  <li><a class='active' href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";
  ?>
</ul>
<?php
error_reporting(0);

$rno=$_GET['rno'];
$date=$_GET['date'];
$name=$_GET['name'];

            
            $con=mysqli_connect("localhost","root","","bd");//connection


            $sql = "SELECT * FROM `client` WHERE `name`='$name'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            $adr = $row[2];//forgen key
            $ph = $row[3];//forgen key
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<center>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h5>Purchase's Manage</h5>
<table>
        <tr>
            <td>Reciving ID</td>
            <td><?php echo" <input style='width:100%' type='number' name='rno' value='$rno' readonly>";?></td>
        </tr>
        <tr>
            <td>Reciving Date</td>
            <td><?php echo" <input style='width:100%' type='date' name='date' value='$date' readonly>";?></td>
        </tr>
        <tr>
            <td>Supplier Name</td>
            <td><?php echo" <input style='width:100%' type='text' name='name' value='$name' readonly>";?></td>
        </tr>
        <tr>
            <td>Supplier Address</td>
            <td><?php echo" <input style='width:100%' type='text' name='adr' value='$adr' readonly>";?></td>
        </tr>
        <tr>
            <td>Supplier Phone</td>
            <td><?php echo" <input style='width:100%' type='text' name='ph' value='$ph' readonly>";?></td>
        </tr>
<form method="POST">
    
        <tr>
                <td>Item</td>
                <td>
                <select style='width:100%' name="item" id="item">    
                <?php $con=mysqli_connect("localhost","root","","bd");//connection
                      $sql="SELECT * FROM item";//query
                      $result2=mysqli_query($con,$sql);?>            
                <?php while ($row2=mysqli_fetch_array($result2)):; ?>
                <option value="<?php echo$row2[1];?>"><?php echo$row2[1];?></option>
                <?php endwhile;?>
            </select>
                </td>
        </tr>
        <tr>
                <td>Quantity</td>
                <td><input style='width:100%' type='number' name='qun' placeholder='Enter Quantity'></td>
        </tr>
        <tr>
            
            <td><button style='width:100%' class='btn btn-outline-warning'name="no" type="submit">BACK</button></td>
            <td><button style='width:100%' class='btn btn-outline-success' name="ok" type="submit">ADD</button></td>
        </tr>
    </table>
</form>



<?php
$n=$_GET['n'];

if($n==1)//delete code
{
        //submit del code

        $sql="DELETE FROM p1 WHERE id=$id";//query
        $query=mysqli_query($con,$sql);//query fire  
        if($query)//check
            header("location: http://localhost/inv1/pur1.php"); 
}

else if($n==3)//add button 
{

        if(isset($_POST['no']))
        {
            //back button code
            header("location: http://localhost/inv1/pur1.php");
        }
        if(isset($_POST['ok']))
        {
            //submit insert code
            $con=mysqli_connect("localhost","root","","bd");//connection
            $sql1 = "SELECT * FROM `p1` WHERE `rno`='$rno'";
            $result1 = mysqli_query($con,$sql1);
            $rs1 = mysqli_fetch_array($result1);
            $pid = $rs1[0];//id no

            $item=$_POST['item'];//item input
            $qun=$_POST['qun'];//quntity input

            $sql = "SELECT * FROM `item` WHERE `item`='$item'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            $price = $row[2];//price

            $amt=$qun*$price;

            $sql2="INSERT INTO `p2`(`pid`, `item`, `price`, `qun`, `amt`) VALUES ('$rno','$item','$price','$qun','$amt')";//query
            $resultx=$con->query($sql2);

////////////////////////////////////////////////////////


            
            $sql = "SELECT * FROM `item` WHERE `item`='$item'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            $q1 = $row[3];//quantity

            $nq=$q1+$qun;//sol final qun

            $sql = "UPDATE `item` SET `qun`='$nq' WHERE `item`='$item'";
            $result = $con->query($sql);

        }

}

?>
<table id="customers">

<tr>
    <th>S.No</th>
    <th>ITEM</th>
    <th>PRICE</th>
    <th>QUANTITY</th>
    <th>AMOUNT</th>
  </tr>


<?php
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
      
?>
</table>

<form method="POST">
<button class='btn btn-outline-success' name="save" type="submit">SAVE</button>
</form>

<?php
if (isset($_POST['save']))
{
    $sql = "SELECT  SUM(amt) from p2 where pid=$rno";
    $result = $con->query($sql);
    $f=0;
//display data on web page
    while($row = mysqli_fetch_array($result))
    {
        echo " Total cost: ". $row['SUM(amt)'];
        echo "<br>";
        $f=$f+$row['SUM(amt)'];
    }
    $sql = "UPDATE `p1` SET `amt`='$f' WHERE rno=$rno";
    $result = $con->query($sql);



}
?>
</div>
</center>