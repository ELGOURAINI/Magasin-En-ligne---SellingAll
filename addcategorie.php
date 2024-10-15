<?php 
session_start();
if(!$_SESSION["emailadmin"])
{
	header("Location:index.php");
}
require_once('connectbdd.php');
if(isset($_POST['btnsaveC']))
{
	$cat=addslashes($_POST['categorie']);

	$query = "INSERT into categorie (NomCat) values ('$cat')";
	$resultat = mysqli_query($con,$query);
	if($resultat)
	{
		header('location : Allproducts.php',true,301);
	}
	else
	{
		//
	}

}






?>