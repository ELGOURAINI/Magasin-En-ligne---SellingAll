<?php
session_start();

  if(!$_SESSION["email"])
    {
        header("Location:index.php");
    }
  ?>

<?php 
require_once('connectbdd.php');

$s = "select * from categorie ";
$result1=mysqli_query($con,$s);
$result2=mysqli_query($con,$s);

require_once('header.php');
require_once('footer.php');

?>