<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }
    
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'magasin');

if(isset($_GET['Del']))
{
    $id=$_GET['Del'];
    $query="DELETE from client where idC=$id";
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