<?php 
session_start();  
require_once('connectbdd.php');

$Email = $_POST['Email'];
$password = $_POST['password'];

$s = "SELECT * from client where EmailC='$Email' and password='$password' and etat='A' ";
$result=mysqli_query($con,$s);
$row=mysqli_fetch_assoc($result);
if(is_array($row))
{
    $_SESSION['emailadmin']=$row['EmailC'];
    header("Location:profile.php");
}
else
{
    header("Location:index.php");
?>
  <script>alert("user not found");</script>
<?php
}
?>

