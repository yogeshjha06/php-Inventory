<?php
error_reporting(0);
?>
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


$id=$_GET['id'];
$n=$_GET['n'];
$name=$_GET['name'];
$d=$_GET['rdate'];
$n10=$_GET['rno'];//common id

error_reporting(0);
$con=mysqli_connect("localhost","root","","bd");//connection
  ?>
</ul>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<center>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h5>Purchase's Manage</h5>
<form method="POST">
    <table>
        <tr>
            <td>Reciving ID</td>
            <td><input style='width:100%' type="number" name="rno" placeholder="Enter Reciving Id" value="<?php echo$n10;?>"></td>
        </tr>
        <tr>
            <td>Reciving Date</td>
            <td><input style='width:100%' type="date" name="rdate" value="2022-10-19" min="2018-01-01" max="2025-10-19" value="<?php echo$d;?>"></td>
        </tr>
        <tr>
            <td>Supplier Name</td>
            <td><select style='width:100%' name="client" id="client">    
                <?php $con=mysqli_connect("localhost","root","","bd");//connection
                      $sql="SELECT * FROM client";//query
                      $result2=mysqli_query($con,$sql);?>            
                <?php while ($row2=mysqli_fetch_array($result2)):; ?>
                <option value="<?php echo$row2[1];?>"><?php echo$row2[1];?></option>
                <?php endwhile;?>
            </select></td>
        </tr>
        <tr>
            
            <td><button style='width:100%'class='btn btn-outline-warning' name="no" type="submit">BACK</button></td>
            <td><button style='width:100%'class='btn btn-outline-success' name="ok" type="submit">SUBMIT</button></td>
        </tr>
    </table>
</form>
</div>
</center>
<?php

if($n==1)//delete code
{
        //submit del code
            $sql = "SELECT rno FROM `p1` WHERE `id`='$id'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            $rno = $row[0];//forgen key

            $sql="DELETE FROM p2 WHERE pid=$rno";//query
            $query=mysqli_query($con,$sql);//query fire  


        $sql="DELETE FROM p1 WHERE id=$id";//query
        $query=mysqli_query($con,$sql);//query fire  
        if($query)//check
            header("location: http://localhost/inv1/pur1.php"); 
}
else if($n==2)//edit code
{
            if(isset($_POST['no']))
            {
                //back button code
                header("location: http://localhost/inv1/pur1.php");
            }
            if(isset($_POST['ok']))
            {
                //submit insert code
                $rno=$_POST['rno'];//purchase rno input
                $date=$_POST['rdate'];//date input
                $name=$_POST['client'];//client input

                $con=mysqli_connect("localhost","root","","bd");//connection
                $sql="UPDATE `p1` SET `rno`='$rno',`rdate`='$date',`name`='$name' WHERE id=$id";//query
                $query=mysqli_query($con,$sql);//query fire  

                header("location: http://localhost/inv1/pur1.php");
            }
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
            $rno=$_POST['rno'];//purchase rno input
            $date=$_POST['rdate'];//date input
            $name=$_POST['client'];//client input

            $con=mysqli_connect("localhost","root","","bd");//connection
            $sql="INSERT INTO `p1`( `rno`, `rdate`, `name`) VALUES ('$rno','$date','$name')";//query
            $result=$con->query($sql);

            if($result)
            {
                header("location: http://localhost/inv1/pur3.php?rno=$rno&date=$date&name=$name&n=3");
            }
        }

}


?>
</table>