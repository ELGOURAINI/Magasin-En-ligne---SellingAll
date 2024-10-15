<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }
require_once('connectbdd.php');

if(isset($_GET['Id']))
{
    $id=$_GET['Id'];
    $query="DELETE from produit where idpro=$id";
    $result= mysqli_query($con,$query);

    if($result)
    {
        header("location: Allproducts.php",true,301);
    }
    else
    {
        echo"<script language='javascript'>";
        echo "alert('probleme!');";
        echo " document.location.href = 'PageproduitAdmine.php';";
        echo"</script>";
    }
}
?>