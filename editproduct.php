<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }

require_once('connectbdd.php');

if(isset($_POST['btnedit']))
{
        $id= $_GET['ID'];
        echo $id;
        $Nom = $_POST['nom'];
        $designation = $_POST['designation'];
        $reduction = floatval($_POST['reduction']);
        $prix = floatval($_POST['prix']);
        $quantite = intval($_POST['quantite']);
    
    $query="UPDATE produit set Nompro='$Nom',designationPro='$designation',quantitePro='$quantite',Prixpro='$prix',reductionPro='$reduction' where idpro='$id'";
    $result=mysqli_query($con,$query);
    header("location:Allproducts.php");
}
else
{
    header("location:Allproducts.php");
}
?>