<?php 
session_start();
if(!$_SESSION["emailadmin"])
{
	header("Location:index.php");
}
if(isset($_POST['btnsave']))
{                           
        if(isset($_FILES["image"])&& $_FILES["image"]["error"]==0)
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
                die("erreur format de fichier incorect");
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
                    
            $con = mysqli_connect('localhost','root','');
            mysqli_select_db($con,'magasin');
            
            $Nom = addslashes($_POST['Nompro']);
            $designation = addslashes($_POST['designationPro']);
            $categorie = intval($_POST['categorie']);
            $prix = floatval($_POST['Prixpro']);
            $reduction = floatval($_POST['reductionPro']);
            $quantite = intval($_POST['quantitePro']);
            $image=$newfilename;

            $s2 = "INSERT into produit(Nompro,designationPro,quantitePro,Prixpro,reductionPro,idCat) values ('$Nom','$designation','$quantite','$prix','$reduction','$categorie')";
            $res = mysqli_query($con,$s2);
            if($res)
            {
                $reg2 = "SELECT MAX(idpro) from produit";
                $result1 = mysqli_query($con, $reg2);    
                $row1=mysqli_fetch_assoc($result1);
                $idproduit=intval($row1['MAX(idpro)']);
                //echo$row1['MAX(idpro)'];
                //echo"ici id produit";echo"<br><br>";
                echo $idproduit;echo"<br>";
    
                $reg3 = "INSERT into photo(Nomphoto,idproduit) values ('$image','$idproduit')";
                mysqli_query($con, $reg3);
                // echo"bien";
                //header('location : Allproducts.php',true,301);

            }
            else
            {
                echo"Non bien";
            }
            
            ///header('location : http://localhost/gestionadmin/PageproduitAdmine.php',true,301);echo"<br><br>";
            //echo" non bien";      
        }
        else
        {
            echo"<script language='javascript'>";
            echo "alert('probléme de photo');";
            echo " document.location.href = 'Allproducts.php';";
            echo"</script>";
        }
                    
    //}
}
else
{
    header('location : Allproducts.php',true,301);
}

?>