<?php 
session_start();
if(!$_SESSION["emailadmin"])
{
	header("Location:index.php");
}
if(!$_SESSION["idpp"])
{
	echo 'id inconnu';
}
var_dump($_SESSION['idpp']);
$id=$_SESSION["idpp"];

if(isset($_POST['btnedit']))
{                           
        if(isset($_FILES["image"])&& $_FILES["image"]["error"]==0 && !empty($_FILES['image']['name']))
        {
                // on arecu l'image
            // on commence la verfication plutot il y a plusieurs
            // un tableau qui va contenir les diffrents extention et le type mine
            $allowed=["jpg"=>"image/jpeg","jpeg"=>"image/jpeg","png"=>"image/png"];
            // on récupre les diffrent optiond du  du fichier
            $filename=$_FILES["image"]["name"];
            $filetype=$_FILES["image"]["type"];
            $filesize=$_FILES["image"]["size"];
            // recupere l'extention de fichier dans la variables d'extension par la fonction pathinfo
            $extension=pathinfo($filename,PATHINFO_EXTENSION);
            // on verifie l'absence de l'etension dans les cle ou l'absence de type mine dans les valeurs
            if(!array_key_exists($extension,$allowed)|| !in_array($filetype,$allowed))
            {
                die("erreur format de fichier incorrect");
            }
            // ici le type est correct  

            // maintenat in verifi la taille et in limite a 1mo
            if($filesize > 1024*1024)
            {
                die("fichiier trop gro");
            }
            // on genere un nom unique 
            $newname=$_FILES["image"]["name"];
            // on genere le chemin complet 
            $newfilename= "uploads/$newname";

            // avec ca on a pri le fichier deposer et on a stocker son chemin ou lui meme dans $newfilename
            // affectation du nouveau nom

            if(!move_uploaded_file($_FILES["image"]["tmp_name"],$newfilename))
            {
                echo"<script>console.log(\"erreur de copiage\")</script>";
            }
        }            
            $con = mysqli_connect('localhost','root','');
            mysqli_select_db($con,'magasin');
            
            $image=$newfilename;
            $reg="INSERT into photo(Nomphoto,idproduit) VALUES ('$image','$id')";
            mysqli_query($con, $reg);
            header("location:Allproducts.php");
        }
if(isset($_POST['close']))
{
    header("location:Allproducts.php");
}
?>