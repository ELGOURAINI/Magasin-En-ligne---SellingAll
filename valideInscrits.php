<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }

require_once('connectbdd.php');

if(isset($_GET['GetId']))
{
    $id=$_GET['GetId'];
    $query="UPDATE client set Etat='C' where idC=$id";
    $result= mysqli_query($con,$query);

    if($result)
    {
        header("location: inscrits.php",true,301);
    }
    else
    {
        echo" probléme !!!";
    }
}
?>