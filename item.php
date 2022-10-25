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
  <li><a class='active' href='http://localhost/inv1/item1.php'>Item</a></li>
  <li><a href='http://localhost/inv1/client1.php'>Vendor</a></li>
  <li><a href='http://localhost/inv1/pur1.php'>Purchase</a></li>
  <li><a href='http://localhost/inv1/sale1.php'>Sale</a></li>
  <li><a href='http://localhost/inv1/repo1.php'>Report</a></li>
  ";



$id=$_GET['id'];
$n=$_GET['n'];
$rr=$_GET['item'];
$yy=$_GET['price'];
$con=mysqli_connect("localhost","root","","bd");//connection
$fun=0;
//////////////////////////////////////////////////
// $sqlx="SELECT * FROM item WHERE id=(SELECT max(id) FROM item);";

// $queryx=mysqli_query($con,$sqlx);//query fire
// $rs1x = mysqli_fetch_array($queryx);
// $a = $rs1x["id"];//last id
?>
</ul>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<center>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h5>Item Manage</h5>
<form method="POST">
    <table>
        <tr>
            <td>Item Name</td>
            <td><input type="text" name="item" placeholder="EnterItem" value="<?php echo$rr;?>"></td>
        </tr>
        <tr>
            <td>Item Price</td>
            <td><input type="decimal" name="price" placeholder="Enter Item Price" value="<?php echo$yy;?>"></td>
        </tr>
        <tr>
            
            <td><button style='width:100%' class='btn btn-outline-warning' name="no" type="submit">BACK</button></td>
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
        
        $sql="DELETE FROM item WHERE id=$id";//query
        $query=mysqli_query($con,$sql);//query fire  
        if($query)//check
            header("location: http://localhost/inv1/item1.php"); 
}
else if($n==2)//edit code
{
            if(isset($_POST['no']))
            {
                //back button code
                header("location: http://localhost/inv1/item1.php");
            }
            if(isset($_POST['ok']))
            {
                //submit insert code
                $item=$_POST['item'];//item input
                $amt=$_POST['price'];//price input  

                $sql="UPDATE `item` SET `item`='$item',`amt`='$amt' WHERE `id`=$id";//query
                $query=mysqli_query($con,$sql);//query fire
                if($query)
                {
                    echo"
                        <script>
                            alert('Item Is Updated To Our Database.');
                        </script>";
                        header("location: http://localhost/inv1/item1.php");
                }
                
            }
}

else if($n==3)//add button 
{

        if(isset($_POST['no']))
        {
            //back button code
            header("location: http://localhost/inv1/item1.php");
        }
        if(isset($_POST['ok']))
        {
            //submit insert code
            $item=$_POST['item'];//item input
            $amt=$_POST['price'];//price input

            $sql = "SELECT COUNT(item) FROM item WHERE item='$item'";
            $q=mysqli_query($con,$sql);
            $result = mysqli_num_rows($q);
            

            $sql="INSERT INTO `item`(`item`, `amt`) VALUES ('$item','$amt')";//query
            $query=mysqli_query($con,$sql);//query fire    
            
            if($query)
                {
                    echo"
                        <script>
                            alert('Item Is Added To Our Database.');
                        </script>";
                        header("location: http://localhost/inv1/item1.php");
                }

        }
    }


?>