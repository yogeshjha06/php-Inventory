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
  <li><a class='active' href='http://localhost/inv1/client1.php'>Vendor</a></li>
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";

  $id=$_GET['id'];
  $n=$_GET['n'];
  $con=mysqli_connect("localhost","root","","bd");//connection

  $n1=$_GET['name'];
  $a1=$_GET['add'];
  $p1=$_GET['ph'];
  ?>
</ul>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<center>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h5>Supplier Manage</h5>
<form method="POST">
    <table>
        <tr>
            <td>Vendor Name</td>
            <td><input type="text" name="client" placeholder="Enter Client" value="<?php echo$n1;?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="add" placeholder="Enter Address" value="<?php echo$a1;?>"></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="tel" pattern="[0-9]{10}" name="phone" placeholder="Enter Mobile" value="<?php echo$p1;?>"></td>
        </tr>
        <tr>
            
            <td><button style='width:100%' class='btn btn-outline-warning' name="no" >BACK</button></td>
            <td><button style='width:100%' class='btn btn-outline-success' name="ok" type="submit">SUBMIT</button></td>
        </tr>
    </table>
</form>
</div>
</center>
<?php

if($n==1)//delete code
{
        //submit del code

        $sql="DELETE FROM client WHERE id=$id";//query
        $query=mysqli_query($con,$sql);//query fire  
        if($query)//check
            header("location: http://localhost/inv1/client1.php"); 
}
else if($n==2)//edit code
{
            if(isset($_POST['no']))
            {
                //back button code
                header("location: http://localhost/inv1/client1.php");
            }
            if(isset($_POST['ok']))
            {
                //submit insert code
                $client=$_POST['client'];//client input
                $add=$_POST['add'];//address input
                $no=$_POST['phone'];//number input

                $con=mysqli_connect("localhost","root","","bd");//connection
                $sql="UPDATE `client` SET `name`='$client',`address`='$add',`number`='$no' WHERE `id`=$id";//query
                $query=mysqli_query($con,$sql);//query fire
                if($query)
                {
                    echo"
                        <script>
                            alert('Client Is Updated To Our Database.');
                        </script>";
                }
                header("location: http://localhost/inv1/client1.php");
            }
}

else if($n==3)//add button 
{

        if(isset($_POST['no']))
        {
            //back button code
            header("location: http://localhost/inv1/client1.php");
        }
        if(isset($_POST['ok']))
        {
            //submit insert code
            $client=$_POST['client'];//client input
            $add=$_POST['add'];//address input
            $no=$_POST['phone'];//number input

            $con=mysqli_connect("localhost","root","","bd");//connection
            $sql="INSERT INTO `client`( `name`, `address`, `number`) VALUES ('$client','$add','$no')";//query
            $query=mysqli_query($con,$sql);//query fire
            if($query)
            {
                echo"
                    <script>
                        alert('New Client Is Added To Our Database.');
                    </script>";
            }
            header("location: http://localhost/inv1/client1.php");
        }

}
?>