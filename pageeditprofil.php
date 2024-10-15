<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }
require_once('connectbdd.php');
$email = $_SESSION['emailadmin'];
$s1 = "SELECT * from client where Etat='A' and EmailC like '$email'";
$result1=mysqli_query($con,$s1);
$row1=mysqli_fetch_assoc($result1);
$id=$row1['idC'];

if(!file_exists($_FILES['photo']['tmp_name']) || !is_uploaded_file($_FILES['photo']['tmp_name']))
{
    $newfilename=$row1['nomphotoC'];
}
else if(isset($_FILES["photo"])&& $_FILES["photo"]["error"]==0 && !empty($_FILES['photo']['name']))
        {
                // on arecu l'photo
            // on commence la verfication plutot il y a plusieurs
            // un tableau qui va contenir les diffrents extention et le type mine
            $allowed=["jpg"=>"image/jpg","jpeg"=>"image/jpeg","png"=>"image/png"];
            // on récupre les diffrent optiond du  du fichier
            $filename=$_FILES["photo"]["name"];
            $filetype=$_FILES["photo"]["type"];
            $filesize=$_FILES["photo"]["size"];
            // recupere l'extention de fichier dans la variables d'extension par la fonction pathinfo
            $extension=pathinfo($filename,PATHINFO_EXTENSION);
            // on verifie l'absence de l'etension dans les cle ou l'absence de type mine dans les valeurs
            if(!array_key_exists($extension,$allowed)|| !in_array($filetype,$allowed))
            {
                die("erreur format de fichier incorect");
            }
            // ici le type est correct  

            // maintenat in verifi la taille et in limite a 1mo
            if($filesize > 1024*1024)
            {
                die("fichiier trop gro");
            }
            // on genere un nom unique 
            $newname=$_FILES["photo"]["name"];
            // on genere le chemin complet 
            $newfilename= "image/$newname";
            // avec ca on a pri le fichier deposer et on a stocker son chemin ou lui meme dans $newfilename
            // affectation du nouveau nom
            if(!move_uploaded_file($_FILES["photo"]["tmp_name"],$newfilename))
            {
                echo"<script>console.log(\"erreur de copiage\")</script>";
            }

        }

if(isset($_POST['btnedit1']))
{
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Tel = $_POST['Tel'];
    $dateNaissance = $_POST['dateNaissance'];
    $Email = $_POST['Email'];
    $adresse = $_POST['adresse']; 
    $etat='C';
    $query="UPDATE client SET NomC='$Nom',PrenomC='$Prenom',TelC='$Tel',EmailC='$Email',DateNaissance='$dateNaissance',AdresseC='$adresse' where idC='$id'";
    $result=mysqli_query($con,$query);
    header("location:profile.php");

}
if(isset($_POST['btnedit2']))
{
    $image=$newfilename; 
    $query="UPDATE client SET nomphotoC='$image' where idC='$id'";
    $result=mysqli_query($con,$query);
    header("location:profile.php");

}
if(isset($_POST['btnedit3']))
{
    $password = $_POST['password'];
    $query="UPDATE client SET password='$password' where idC='$id'";
    $result=mysqli_query($con,$query);
    header("location:profile.php");
}

?>


