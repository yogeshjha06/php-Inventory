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
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a class='active' href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";


$id=$_GET['id'];
$n=$_GET['n'];
$name=$_GET['name'];
$n10=$_GET['rno'];

error_reporting(0);
$con=mysqli_connect("localhost","root","","bd");//connection
  ?>
</ul>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<center>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h5>Sale's Manage</h5>
<form method="POST">
    <table>
        <tr>
            <td>Reciving ID</td>
            <td><input style='width:100%' type="number" name="rno" placeholder="Enter Reciving Id" value="<?php echo$n10;?>"></td>
        </tr>
        <tr>
            <td>Reciving Date</td>
            <td><input style='width:100%' type="date" name="rdate" value="2022-10-19" min="2018-01-01" max="2025-10-19"></td>
        </tr>
        <tr>
            <td>Vendor Name</td>
            <td><input style='width:100%' type="text" name="name" value="<?php echo$name;?>"></td>
        </tr>
        <tr>
            <td>Vendor Contact</td>
            <td><input style='width:100%' type="tel" pattern="[0-9]{10}" name="ph" value="<?php echo$ph;?>"></td>
        </tr>
        <tr>
            <td>Vendor Address</td>
            <td><input style='width:100%' type="text" name="add" value="<?php echo$name;?>"></td>
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
            $sql = "SELECT rno FROM `s1` WHERE `id`='$id'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            $rno = $row[0];//forgen key

            $sql="DELETE FROM s2 WHERE sid=$rno";//query
            $query=mysqli_query($con,$sql);//query fire  


            $sql="DELETE FROM s1 WHERE id=$id";//query
            $query=mysqli_query($con,$sql);//query fire  
            if($query)//check
                header("location: http://localhost/inv1/sale1.php"); 
}
else if($n==2)//edit code
{
            if(isset($_POST['no']))
            {
                //back button code
                header("location: http://localhost/inv1/sale1.php");
            }
            if(isset($_POST['ok']))
            {
                //submit insert code
                $rno=$_POST['rno'];//purchase rno input
                $date=$_POST['rdate'];//date input
                $name=$_POST['name'];//client input
                $ph=$_POST['ph'];//date input
                $add=$_POST['add'];//client input

                $con=mysqli_connect("localhost","root","","bd");//connection
                $sql="UPDATE `s1` SET `rno`='$rno',`rdate`='$date',`name`='$name',`ph`='$ph',`add`='$add' WHERE id=$id";//query
                $query=mysqli_query($con,$sql);//query fire  

                header("location: http://localhost/inv1/sale1.php");
            }
}

else if($n==3)//add button 
{

        if(isset($_POST['no']))
        {
            //back button code
            header("location: http://localhost/inv1/sale1.php");
        }
        if(isset($_POST['ok']))
        {
            //submit insert code
            $rno=$_POST['rno'];//purchase rno input
            $date=$_POST['rdate'];//date input
            $name=$_POST['name'];//client input
            $ph=$_POST['ph'];//date input
            $add=$_POST['add'];//client input

            $con=mysqli_connect("localhost","root","","bd");//connection
            $sql="INSERT INTO `s1`(`rno`, `rdate`, `name`, `ph`, `add`) VALUES ('$rno','$date','$name','$ph','$add')";//query
            $result=$con->query($sql);

            if($result)
            {
                header("location: http://localhost/inv1/sale3.php?ph=$ph&add=$add&rno=$rno&date=$date&name=$name&n=3");
            }
        }

}

?>