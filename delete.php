<?php


      $id=$_GET["id"];

      $server="localhost";
      $username="root";
      $password="";
      $dbname="brand";

      $con=mysqli_connect($server,$username,$password,$dbname);

      $sql="DELETE FROM brand WHERE id=$id";
      $result=$con->query($sql);

      if(!$result)
      {
        die("QUery Error: ".$con->error);
      }

      header("http://localhost/inv/home.php");
      exit;

?>